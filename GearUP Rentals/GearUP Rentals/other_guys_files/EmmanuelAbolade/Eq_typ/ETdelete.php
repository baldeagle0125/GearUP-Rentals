<!DOCTYPE html>
<!--
Name: Emmanuel Abolade
Student number: c00288657
Date: 12/02/2024
Project: c2p-equiphire
Task: Writing the program for ETDeleteFully.php
-->

<html lang="en" id = "html"> 
<head> 
    <title>Deleting an Equipment Type</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Set the responsive size of screen-->

	<script type="text/javascript" src="ETsupplierlist.js"></script>
</head>

	<!-- include database when the form is submitted -->
<body>
	<?php 
		session_start();
		include "menu.php"; // Includes menu navigation
	?>
	
	<!-- Container div to group and organize content -->
	<div class="container">
		<?php
			include 'db.inc.php'; // Establish the database connection
			date_default_timezone_set('UTC'); // Set the default timezone to UTC (ensure consistent date and time)

			// SQL query to update person details in the 'equipment type' table based on the provided ID
			$sql = "UPDATE equipment_type SET is_deleted = true WHERE id = '$_POST[delid]'"; 
		
		    // Alternatively, if you want to actually delete the record, not just set the flag.
		    //$sql = "DELETE FROM Person WHERE personid = '$_POST[delid]'"; 
		
			// Check if the SQL update query is successful | if not, display an error message
			if (!mysqli_query($con, $sql)) 
			{
				echo "Error..." . mysqli_error($con);
			} 
		
			// Set session variables
			$_SESSION["ETid"] = $_POST['delid'];
			$_SESSION["description"] = $_POST['deldescription'];
			$_SESSION["brand"] = $_POST['delbrand'];
			

			// Close the database connection
			mysqli_close($con);
			
			header ( 'Location: ETDeleteFully.php' );
			exit();
			?>

			<!-- Submit button to return to the previous Page -->
			<!--script>
				window.location = "ETdelete.php"
			</script-->
		
		
