<!--include menu.php, database and set the default for time-->
<?php
include "menu.php";
include 'db.inc.php';
date_default_timezone_set('UTC');   
?>	
<!DOCTYPE html>
<!--
Name: Emmanuel Abolade
Student number: c00288657
Date: 12/02/2024
Project: c2p-equiphire
--> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding equipment Hire</title>
	<link rel ="stylesheet" href="menu.css"/> <!--link to external style sheet called ET.css-->
    
</head>
<body>
    <!-- Container for the content -->
    <div class="container">
        <!-- PHP code to execute and display form -->
        
<?php
// Establish a database connection by including 'db.inc.php'
include 'db.inc.php';
		
date_default_timezone_set("UTC");
		
// Query to fetch staff from the database
$sql = "SELECT * FROM staff";
$result1 = $con->query($sql);
		
		
// Query to fetch staff from the database
$sql = "SELECT * FROM customer";
$result2 = $con->query($sql);
		
		
// Query to fetch staff from the database
$sql = "SELECT * FROM equipment_type";
$result3 = $con->query($sql);
		
// Query to fetch equipment_item from the database
$sql = "SELECT * FROM equipment_item";
$result4 = $con->query($sql);

// Check if form is submitted
if (isset($_POST['Submit'])) {
    // Retrieve form data
    $staff = $_POST['staff'];
    $customer = $_POST['customer'];
    $equipment_type = $_POST['equipment_type'];
    
    $payment = isset($_POST['payment']) ? true : false; // Check if payment is selected
	$isDeleted = 0;// Default value for new equipment types
    		
	
	
	
    // Define the function to find hire cost = num of day * num of items * rental cost
    function multiplyNums($num1, $num2, $num3) { 
        $result = $num1 * $num2 * $num3;
        return $result; 
    } 

    // Retrieve number of days and number of items from form
    $num_days = $_POST['num_days'];
    $num_items = $_POST['num_items'];

    // Execute SQL query to fetch cost per day
    $cost_query = "SELECT cost_per_day FROM equipment_type INNER JOIN equipment_item ON equipment_type.id = equipment_item.type_id";
    $cost_result = $con->query($cost_query);
    
    // Check if the query was successful
    if ($cost_result && $cost_row = $cost_result->fetch_assoc()) {
        // Extract the cost per day from the query result
        $cost_per_day = $cost_row['cost_per_day'];
        
        // Calculate hire cost using the retrieved cost per day
        $hirecost = multiplyNums($num_days, $num_items, $cost_per_day);
    } else {
        // Handle error if the query fails
        echo "Error fetching cost per day: " . $con->error;
        exit(); // Exit the script if an error occurs
    }

	
	
	
	
	
		
	
	// Calculate due date based on the current date and number of days
    $dueDate = date('Y-m-d', strtotime('+' . $num_days . ' days'));
	
    // connection to the database and insertion code:
	$id_sql = "SELECT MAX(hire.id) FROM hire";

	if(!($result = mysqli_query($con, $id_sql))) {
    die(mysqli_error($con));
}
	//this will add a new hire id to our db (after it's executed)
	$new_id = (mysqli_fetch_array($result) [0]) + 1;

	
	
     $con = new mysqli($hostname, $username, $password, $dbname);
     $sql = "INSERT INTO hire (id, number_of_days, duedate, cost, item_id, customer_id, is_deleted) VALUES ($new_id, '$num_days', '$dueDate', '$hirecost', '$equipment_type', '$customer', '$isDeleted')";
     $result = $con->query($sql);
     if ($result) {
         echo "<br><br>" . "Hire Record added successfully" . "<br><br>";
     } else {
         echo "Error in adding record, please try again: " . $sql . "<br>" . $con->error;
     }
     $con->close();
    
    // display the submitted data
	echo '<h2>The details of Hire submitted are: </h2><br>';
    echo "Hire Reference Num: " . $new_id . "<br>";
	
    echo "Customer: " . $customer . "<br>";
    echo "Equipment Type Description: " . $equipment_type . "<br>";
    echo "Number of Hire Days: " . $num_days . "<br>";
    echo "Due Date for Return: " . $dueDate . "<br>";
    echo "Hire cost: " . $hirecost . "<br>";
} else {
    // Redirect to the add equipment type page if form is not submitted
    header("Location: hire_equipment.html.php");
    exit();
}
?>
        <br><br>
		<!-- Form to submit or reset -->
        <form action="ETaddhire.php" method="post" class="display">
            <input type='submit' value='Return to Hire Page'> <!-- Button to return to Add Equipment page -->
        </form>
    <script>
					document.getElementById("hireform").addEventListener("Submit", function(event) {
  					var confirmation = confirm("Are you sure you want to continue? Y/N");
  					if (!confirmation) {
    					event.preventDefault();
  						}
					});
			</script>
		
		
    </div>
	<?php 	include "footer.php";
	?>
</body>
</html>


if (isset($_POST['Submit'])) {
    // Retrieve form data
    $staff = $_POST['staff'];
    $customer = $_POST['customer'];
    $equipment_type = $_POST['equipment_type'];
    
    $payment = isset($_POST['payment']) ? true : false; // Check if payment is selected
    $isDeleted = 0; // Default value for new equipment types

    // Retrieve number of days and number of items from form
    $num_days = $_POST['num_days'];
    $num_items = $_POST['num_items'];

    // Calculate hire cost using the retrieved cost per day
    $cost_query = "SELECT cost_per_day FROM equipment_type WHERE id = '$equipment_type'";
    $cost_result = $con->query($cost_query);
    
    if ($cost_result && $cost_row = $cost_result->fetch_assoc()) {
        $cost_per_day = $cost_row['cost_per_day'];
        $hirecost = $num_days * $num_items * $cost_per_day;
    } else {
        echo "Error fetching cost per day: " . $con->error;
        exit();
    }

    // Calculate due date based on the current date and number of days
    $dueDate = date('Y-m-d', strtotime('+' . $num_days . ' days'));

    // Insert hire record into the database
    $sql = "INSERT INTO hire (number_of_days, duedate, cost, item_id, customer_id, is_deleted) 
            VALUES ('$num_days', '$dueDate', '$hirecost', '$equipment_type', '$customer', '$isDeleted')";
    $result = $con->query($sql);
    
    if ($result) {
        // Update is_hired column in equipment_item table
        $update_query = "UPDATE equipment_item SET is_hired = 1 WHERE type_id = '$equipment_type'";
        $update_result = $con->query($update_query);
        
        if ($update_result) {
            echo "Hire Record added successfully";
        } else {
            echo "Error updating is_hired status: " . $con->error;
        }
    } else {
        echo "Error adding record: " . $con->error;
    }
} else {
    header("Location: ETaddhire.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Equipment Hire</title>
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    <div class="container">
        <br><br>
        <form action="ETaddhire.php" method="post" class="display">
            <input type='submit' value='Return to Hire Page'> <!-- Button to return to Add Equipment page -->
        </form>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>
