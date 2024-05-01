<!--
**	Student:        Marvin A. Z. Santos
**	Id:	            C00288302
** 	Date:			12/04/2024
**	Info:			This page handles the deletion of supplier information from a database, and display the confirmation.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Link to external CSS file -->
    <link rel="stylesheet" href="mainStyle.css">

</head>
<body>
    <!-- Include Header -->
    <?php include 'menu.php'; ?>

    <!-- Main Content Area -->
    <div class="main-content">
        
       <!-- LEFT Content - Submenu 
        <aside class="left-content">
			<!-- Include Submenu 
    		php include 'supplierSubmenu.html.php'; ?>
        </aside>
        
        <!-- RIGHT Content - Form -->
        <section class="right-content">
			<?php 
				include 'marvin.db.inc.php'; // Establish the database connection
				date_default_timezone_set('UTC'); // Set the default timezone to UTC (ensure consistent date and time)
				
				// SQL query to update person details in the 'Persons' table based on the provided person ID
				$sql = "UPDATE supplier SET is_deleted = 1 WHERE id = '$_POST[delId]'"; 

				// Check if the SQL update query is successful | if not, display an error message
				if (!mysqli_query($con, $sql)) 
				{
					echo "Error..." . mysqli_error($con);
				} 
				else 
				{	//display a confirmation message after successfully deleting a supplieR
					echo "<br><br><br><h3><span style='font-size:30px;'>&#10004; </span> The Supplier &quot<i>". $_POST['delTradingName'] ."&quot has been deleted successfully.</h3>";
				
				}
			
				// Close the database connection
				mysqli_close($con);

				?>
				
				<!-- Submit button to return to the Supplier Delete Page -->
				<form  action="supplierDelete.html.php" method="POST">
					<br>
					<input  type="submit" value="Return to Delete Page">
				</form>	   
		</section>
    </div>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>

</body>
</html>


