<!--include menu.php with menu.css for style, database for connection and set the default for time-->
	<?php 	
	  		include 'db.inc.php';
	  		date_default_timezone_set('UTC');
	?>
<!DOCTYPE html>
<!--
Name: Emmanuel Abolade
Student number: c00288657
Date: 12/02/2024
Project: c2p-equiphire
Task: Writing the program for ETdisplayview.php
-->
<?php session_start(); ?>
<html lang="en" id = "html"> 
<head> 
    <title>Display view for Equipment Type</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Set the responsive size of screen-->
</head>
	

<body>
	<?php //Display all equipment types where Equipment type ID matches

		//Allows to store and retrieve values across multiple pages for a specific user
		session_start();
		include 'db.inc.php';

		//Query to retrieve all columns from the "Person" table where the "personId" matches
		$sql = "SELECT * FROM equipment_type WHERE equipment_type.id = " . $_POST['ETid'];
	
		//Checks the result of a database query to make sure it is correct
        //and prints an error message that includes details about what went wrong
		if (!$result = mysqli_query($con,$sql))
		{
			die('Error in querying the database' . mysqli_error($con));
		}
	
		//Retrives the number of rows affected by the most recent MySQL operation performed
        //Like:  an (INSERT, UPDATE, DELETE) 
		$rowcount = mysqli_affected_rows($con);
	
		//Takes the value submitted with the form (personid) and store it in a session variable named
        //'personid' so that we can use it on other pages during the same user session
		$_SESSION['ETid'] = $_POST['ETid'];
	
		
		if ($rowcount ==1)
		{
			//Retrieves a single row of data from the result of the MySQL query and store it in the variable $row
			$row = mysqli_fetch_array($result);

			$_SESSION['ETid'] = $row['id'];
			$_SESSION['ETdescription'] = $row['description'];
			$_SESSION['ETbrand'] = $row['brand'];
			$_SESSION['ETcategory'] = $row['category'];
			$_SESSION['supplier'] = $row['supplier_id'];
			$_SESSION['cataloguecode'] = $row['supplier_catalogue_code'];
			$_SESSION['rentalcostperday'] = $row['cost_per_day'];

		}

		//Checks if the variable $rowcount is equal to 0, meaning that no rows were affected by the most recent MySQL operation
		else if ($rowcount ==0)
		{
			unset ($_SESSION['ETdescription']);
			unset ($_SESSION['ETbrand']);
			unset ($_SESSION['ETcategory']);
			unset ($_SESSION['supplier']);
			unset ($_SESSION['cataloguecode']);
			unset ($_SESSION['rentalcostperday']);
		}
	
		//Close the connection to the MySQL database to free up resources
		mysqli_close($con);
	
	
		//Go back to the calling form - with the values that we need to display in seession variable, if a record was found
		header ('Location: ETviewhtml.php');//Redirect the user's browser to the page named 'view.html.php'
		//or alternatively use the following
		//echo "<script>window.location.href = 'ETviewhtml.php'</script>";


	?>

		
	
</body>
</html> 