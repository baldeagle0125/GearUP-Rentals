<!DOCTYDE html>
<!--
Name: Emmanuel Abolade
Student number: c00288657
Date: 08/02/2024
Lab: 3A
--> 
<html> 
<head> 
    <title>Insert- Student form html</title>
    <link rel ="stylesheet" href="insertET.css"/> <!--link to external style sheet called E1.css-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Set the responsive size of screen-->
</head> 
<body> 
<?php
// Established a database connection
include 'db.inc.php';
date_default_timezone_set("UTC");
// Query to fetch suppliers from the database
$sql = "SELECT * FROM supplier";
$result = $con->query($sql);

// Check if there are any suppliers
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo 'Supplier selected: '. '<option value="' . $row['id'] . '">' . $row['trading_name'] . '.' . '</option>';
    }
} else {
    echo '<option value="">No suppliers found</option>';
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $description = $_POST['ETdescription'];
    $brand = $_POST['ETbrand'];
    $category = $_POST['ETcategory'];
    $supplier = $_POST['supplier'];
    $catalogue_code = $_POST['cataloguecode'];
    $rental_cost = $_POST['rentalcostperday'];
	$isDeleted = $_POST['0'];// Default value for new equipment types
    
    // Perform database operations (insertion)
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
         echo "New record added successfully" . "<br>";
     } else {
         echo "Error: " . $sql . "<br>" . $con->error;
     }
     $con->close();
    
    // display the submitted data
	echo 'The details of equipment type sent down are: <br>';

    echo "Description: " . $description . "<br>";
    echo "Brand: " . $brand . "<br>";
    echo "Category: " . $category . "<br>";
    echo "Supplier: " . $supplier . "<br>";
    echo "Catalogue Code: " . $catalogue_code . "<br>";
    echo "Rental Cost: " . $rental_cost . "<br>";
} else {
    // Redirect to the add equipment type page if form is not submitted
    header("Location: addET.html.php");
    exit();
}
?>
<form action="insertET.html" method="post">
    <br>
    <input type='submit' value='Return to Insert Page'> <!-- To go back to Add Equipment page  -->
	
</form>
<form action="menuETmaintenance.html" method="post">
    <br>
    <input type='submit' value='Return to Equipment Type Maintenance Menu Page'> <!-- To go back to Equipment Type maintenance menu page  -->
	
</form>
	
</body>
</html>