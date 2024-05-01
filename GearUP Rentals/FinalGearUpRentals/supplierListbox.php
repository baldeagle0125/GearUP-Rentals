<!--
** 		Student:    Marvin A. Z. Santos
**    	Id:         C00288302
**		Date:		12/04/2024
**		Info:		This page retrieves supplier information from a database and generates a dropdown list (select element) with the 		**					retrieved dataand submitting it for confirmation
-->

<!DOCTYPE html>
<html>
  <body>
	  <?php
	  	include 'marvin.db.inc.php'; //Includes an external PHP file
		date_default_timezone_set("UTC"); //Sets the default timezone to UTC

	  	// SQL query to retrieve data from the 'Supplier' table where 'DeletedFlag' is 0 (not deleted)
	  	$sql = "SELECT id, trading_name, address, eircode, phoneno, email, website FROM supplier WHERE is_deleted = 0";

	  	// Check if the database query is successful | if not, display an error message and terminate the script
	  	if (!$result = mysqli_query($con, $sql))
	  	{
		  	die('Error in querying the database --> ' . mysqli_error($con));
	  	}

	  	// Display a line break and create a dropdown list (select element) with a specific name, ID, and an onclick event
	  	echo "<select name='listbox' id='listbox' onclick='populate()'>";

	  	// Iterate through each row in the result set obtained from the database query
	  	while ($row = mysqli_fetch_array($result))
		{
			// Extract values from the current row
			$supplier_id = $row['id'];
			$supplier_name = $row['trading_name'];
			$supplier_address = $row['address'];
			$supplier_eircode = $row['eircode'];
			$supplier_phone = $row['phoneno'];
			$supplier_email = $row['email'];
			$supplier_website = $row['website'];

			
			// Combine person details into a single string for each option in the dropdown list
			$allText = "$supplier_id,$supplier_name,$supplier_address,$supplier_eircode,$supplier_phone,$supplier_email,$supplier_website";

			// Display an option in the dropdown list with the combined person details
			echo "<option value='$allText'>$supplier_name</option>";
	   }

	   // Close the dropdown list tag
	   echo "</select>";

	   // Close the database connection
	   mysqli_close($con);
	 ?>
  </body>
</html>
