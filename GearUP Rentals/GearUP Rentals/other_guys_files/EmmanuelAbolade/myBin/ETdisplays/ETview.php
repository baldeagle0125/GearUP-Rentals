<!DOCTYPE html>
<!--
Name: Emmanuel Abolade
Student number: c00288657
Date: 12/02/2024
Project: c2p-equiphire
Task: Writing the program for ETview.php
-->

<html lang="en" id = "html"> 
<head> 
    <title>View Equipment Type</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Set the responsive size of screen-->

	<script type="text/javascript" src="ETsupplierlist.js"></script>
</head>
<body>
	<?php
		
		include 'db.inc.php'; //import data base
		date_default_timezone_set("UTC"); //import calendar

		$sql = "SELECT * FROM equipment_type WHERE id = " .$_POST['ETid']; //using equipment type table and the id

		$result = mysqli_query($con, $sql); //obtain query connected to data base as result variable
		if (!mysqli_query($con, $sql)) //if unable to connect to data base, output An error message and End 
		{
			die ("An error in the SQL Query: " . mysqli_error($con));
		}

		$rowcount = mysqli_affected_rows ($con); //obtain rows that changes are affected
		if (!mysqli_affected_rows($con)) //if unable to connect to data base, output An error message and End
		{
			die ("An error in the SQL affected rows: " . mysqli_error($con));
		}
		
		//Displays details if a record is found or a message, 
        //if no matching records are found
		if ($rowcount ==1) //if row count was successful, continue with the following output
		{
			echo "<br>The details of the selected Equipment Type are <br><br>";
			$row = mysqli_fetch_array($result);
	
			echo "The Equipment Type ID :" . $_POST['ETid'] . "<br><br>";
			echo "Description :";
			echo $row['description'] . "<br>";
			echo "Brand :";
			echo $row['brand'] . "<br>";
			echo "Category : ";
			echo $row['category'] . "<br>";
			echo "Supplier ID : ";
			echo $row['supplier_id'] . "<br>";
			echo "Supplier Catalogue Code : ";
			echo $row['catalogue_code'] . "<br>";
			echo "Rental cost per day : ";
			echo $row['cost_per_day'] . "<br>";
		}
			else if ($rowcount == 0)
			{
			echo "No matching records";
			}
	
			//Closes the database connection to free up resources
			mysqli_close($con);
		?>
	<form action = "ETviewhtml.php" method = "post">
		<br>
		<input type = "submit" value = "Return to select page"/>
	</form>
</body>