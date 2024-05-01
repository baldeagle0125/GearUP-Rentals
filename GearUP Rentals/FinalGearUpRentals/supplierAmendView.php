<!--
**	Student:        Marvin A. Z. Santos
**	Id:	            C00288302
**	Info:			This page send the information added to the Add New Supplier Form to the database, and display the confirmation.
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
    <?php include 'navigationMenu.php'; ?>

    <!-- Main Content Area -->
    <div class="main-content">
        
       <!-- LEFT Content - Submenu -->
        <aside class="left-content">
			<!-- Include Submenu -->
    		<?php include 'supplierSubmenu.html.php'; ?>
            
        </aside>
        
        <!-- RIGHT Content - Form -->
        <section class="right-content">
			<?php
				include 'marvin.db.inc.php';  // Establish the database connection
				date_default_timezone_set("UTC"); //Sets the default timezone to UTC

				// SQL query to update person details in the 'Suppliers' table based on the provided person ID
				$sql = "UPDATE supplier SET trading_name = '$_POST[amendTradingName]', address = '$_POST[amendAddress]', eircode = '$_POST[amendEircode]', phoneno = '$_POST[amendPhoneNo]', email = '$_POST[amendEmail]', website = '$_POST[amendWebsite]' WHERE id = '$_POST[amendId]' ";

				// Check if the SQL update query is successful | if not, display an error message
				if (!mysqli_query($con, $sql)) 
				{
					echo "Error..." . mysqli_error($con);
				} 
				else 
				{
					// Check the number of affected rows after the update
					if (mysqli_affected_rows($con) != 0) 
					{
						// Display the number of records updated and details of the updated person
						// echo mysqli_affected_rows($con) . " record(s) updated <br>"; ---- DELETE IF NOT USED ---
						echo "<br><br><br><h3><span style='font-size:30px;'>&#10004; </span> The Supplier &quot<i>". $_POST['amendTradingName'] ."</i>&quot has been updated successfully. </h3>";
					} 
					else 
					{
						// Display a message if no records were changed during the update
						echo "No records were changed.";
					}
				}

				// Close the database connection
				mysqli_close($con);
				?>
			
				<!--Submit button to return to Supplier Ammend/View Page -->
				<form action="supplierAmendView.html.php" method="POST"><br>
					<input type="submit" value="Return to Ammend/View Page">
				</form>
		</section>
		
    </div>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>

</body>
</html>


