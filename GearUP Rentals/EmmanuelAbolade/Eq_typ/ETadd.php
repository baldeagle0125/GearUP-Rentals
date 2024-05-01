<!--include menu.php, database and set the default for time-->
	<?php 	include "menu.php";
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
    <title>Add Equipment Type</title>
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
		
// Query to fetch suppliers from the database
$sql = "SELECT * FROM supplier";
$result = $con->query($sql);

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $description = $_POST['ETdescription'];
    $brand = $_POST['ETbrand'];
    $category = $_POST['category'];
    $supplier = $_POST['supplier'];
    $catalogue_code = $_POST['cataloguecode'];
    $rental_cost = $_POST['rentalcostperday'];
	$isDeleted = 0;// Default value for new equipment types
    
	
    // connection to the database and insertion code:
	$id_sql = "SELECT MAX(equipment_type.id) FROM equipment_type";

	if(!($result = mysqli_query($con, $id_sql))) {
    die(mysqli_error($con));
}
	//this will add a equipment_type to our db (after it's executed)
	$new_id = (mysqli_fetch_array($result) [0]) + 1;

	
	
     $con = new mysqli($hostname, $username, $password, $dbname);
     $sql = "INSERT INTO equipment_type (id, description, brand, category, supplier_id, supplier_catalogue_code, cost_per_day, is_deleted) VALUES ($new_id, '$description', '$brand', '$category', '$supplier', '$catalogue_code', '$rental_cost', '$isDeleted')";
     $result = $con->query($sql);
     if ($result) {
         echo "<br><br>" . "New record added successfully" . "<br><br>";
     } else {
         echo "Error in adding record, please try again: " . $sql . "<br>" . $con->error;
     }
     $con->close();
    
    // display the submitted data
	echo '<h2>The details of Equipment Type added are: </h2><br>';
    echo "Description: " . $description . "<br>";
    echo "Brand: " . $brand . "<br>";
    echo "Category: " . $category . "<br>";
    echo "Supplier ID: " . $supplier . "<br>";
    echo "Catalogue Code: " . $catalogue_code . "<br>";
    echo "Rental Cost: " . $rental_cost . "<br>";
} else {
    // Redirect to the add equipment type page if form is not submitted
    header("Location: ETaddhtml.php");
    exit();
}
?>
        <br><br>
		<!-- Form to submit or reset -->
        <form action="ETaddhtml.php" method="post" class="display">
            <input type='submit' value='Return to Insert Page'> <!-- Button to return to Add Equipment page -->
        </form>
    
    </div>
	<?php 	include "footer.php";
	?>
</body>
</html>
