<!DOCTYPE html>
<!--
Name: Emmanuel Abolade
Student number: c00288657
Date: 12/02/2024
Project: c2p-equiphire
Task: Writing the program for ETamendview.php
-->

<html lang="en" id = "html"> 
<head> 
    <title>View and Amend Equipment Type</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Set the responsive size of screen-->

	<script type="text/javascript" src="ETsupplierlist.js"></script>
</head>
<body>
	<!-- Container div to group and organize content -->
	<div class="container">
		<?php
		// Include the file that contains the database connection details
		include 'db.inc.php';

		// Set the default timezone to UTC to ensure consistent date and time handling
		date_default_timezone_set('UTC');

		// SQL query to update equipment type details in the 'equipment_type' table based on the provided ID
		$sql = "UPDATE equipment_type SET description = '$_POST[amenddescription]', brand = '$_POST[amendbrand]', category = '$_POST[amendcategory]', supplier_id = '$_POST[amendsupplier]', supplier_catalogue_code = '$_POST[amendcataloguecode]', cost_per_day = '$_POST[amendrentalcost]' WHERE id = '$_POST[amendid]' ";

		// Check if the SQL update query is successful; if not, display an error message
		if (!mysqli_query($con, $sql)) {
			echo "Error..." . mysqli_error($con);
		} else {
			// Check the number of affected rows after the update
			if (mysqli_affected_rows($con) != 0) {
				// Display the number of records updated and details of the updated equipment type
				echo mysqli_affected_rows($con) . " record(s) updated <br>";
				echo "Equipment Type Id: " . $_POST['amendid'] . ", " . $_POST['amenddescription'] . " " . $_POST['amendbrand'] . " has been updated.";
			} else {
				// Display a message if no records were changed during the update
				echo "No records were changed.";
			}
		}

		// Close the database connection
		mysqli_close($con);
		?>

		<!-- Submit button to return to the previous screen -->
		<form action ="ETamendviewhtml.php" method="POST"><br>
			<input id="amendview" type="submit" value="Return to Previous Screen">
		</form>
	</div>

</body>
</html>