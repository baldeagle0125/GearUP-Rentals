<!--include menu.css for style, database for connection and set the default for time-->
	<?php 	
	  		include 'db.inc.php';
	  		date_default_timezone_set('UTC');
	?>
<!DOCTYPE html>
<!--
Name: Emmanuel Abolade
Student number: c00288657
Date: 12/03/2024
Project: c2p-equiphire
Task: Writing the program for ETlistbox.php
-->
<!DOCTYPE html>
<html>
	<head>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="menu.css">
    	<title>The listbox for Equipment Types Amend view</title>
	</head>
  	<body>
		
	  	    
   	<?php
	  	
	  	date_default_timezone_set('UTC');
		
		// Include the file that contains the database connection details
		include 'db.inc.php'; 

		// Set the default timezone to UTC to ensure consistent date and time handling
		date_default_timezone_set("UTC");

		// SQL query to retrieve data from the 'equipment_type' table 
		$sql = "SELECT id, description, brand, category, supplier_id, supplier_catalogue_code, cost_per_day FROM equipment_type";

		
		// Check if the database query is successful; if not, display an error message and terminate the script
		if (!$result = mysqli_query($con, $sql))
		{
			die('Error in querying the database ' . mysqli_error($con));
		}
		
		// Display a line break and create a dropdown list (select element) with a specific description, ID, and an onclick event
		echo "<br><select name='listbox' id='listbox' onclick='populate()'>";

		// Iterate through each row in the result set obtained from the database query
		while ($row = mysqli_fetch_array($result)){

			// Extract values from the current row
			$id = $row['id'];
			$descrition = $row['description'];
			$brand = $row['brand'];
			$category = $row['category'];
			$supplier = $row['supplier_id'];
			$cataloguecode = $row['supplier_catalogue_code'];
			$costperday = $row['cost_per_day'];

			// Combine person details into a single string for each option in the dropdown list
			$allText = "$id/$descrition/$brand/$category/$supplier/$cataloguecode/$costperday";

			// Display an option in the dropdown list with the combined person details
			echo "<option value='$allText'>$descrition $brand</option>";
		}
		

		// Close the dropdown list tag
		echo "</select>";
		
		//Close the database connection
		
		mysqli_close($con);
		?>
		
  	</body>
	
</html>