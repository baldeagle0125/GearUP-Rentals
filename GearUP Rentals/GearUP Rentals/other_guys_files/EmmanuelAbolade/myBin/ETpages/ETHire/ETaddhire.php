<!--include menu.php, database and set the default for time-->
	<?php 	include "../ETCommonmenu/menu.php";
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
	<link rel ="stylesheet" href="../ETCommonmenu/menu.css"/> <!--link to external style sheet called ET.css-->
    
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
$result2 = $con->query($sql);

// Check if form is submitted
if (isset($_POST['Submit'])) {
    // Retrieve form data
    $staff = $_POST['staff'];
    $customer = $_POST['customer'];
    $equipment_type = $_POST['equipment_type'];
    $num_days = $_POST['num_days'];
    $payment = isset($_POST['payment']) ? true : false; // Check if payment is selected
	$isDeleted = 0;// Default value for new equipment types
    
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
     $sql = "INSERT INTO hire (id, number_of_days, duedate, item_id, customer_id, is_deleted) VALUES ($new_id, '$num_days', '$dueDate', '$equipment_type', '$customer', '$isDeleted')";
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
    
    </div>
	<?php 	include "../ETCommonmenu/footer.php";
	?>
</body>
</html>
