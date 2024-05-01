<!--include menu.php with menu.css for style, database for connection and set the default for time-->
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
Task: Writing the program for ETviewhtml.php
-->
<?php session_start(); ?>
<html lang="en" id = "html"> 
<head> 
    <title>Viewing and Amending Equipment Type</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Set the responsive size of screen-->

	<script type="text/javascript" src="ETsupplierlist.js"></script>
</head>
	
<body>
			
    <!--form field-->	 
	<form name="addETform" id="addETform" onsubmit="return validateForm()" method="POST" action="ETdisplayview.php">
        
		<!--Form title-->
        <h1>VIEW OR AMEND AN EQUIPMENT TYPE</h1> 
           
        <!-- Equipment type id field -->
        <label for="ETid">Equipment Type ID: </label> 
            <input type="text" name="ETid" id="ETid" placeholder = "Enter the ID for the Equipment Type" Title="Ex. 010: Only numbers allowed" pattern ="[0-9]*" autocomplete=off disabled value = "<?php if (ISSET ($_SESSION['ETid']) ) echo $_SESSION['ETid']?>" /> 
			
		<!-- description field -->
		<label for="ETdescription">Description: </label>
			 <input type="text" name="ETdescription" id="ETdescription" placeholder="Enter a description of the Equipment Type" Title="Ex. Cordlesss Drill" autocomplete=off required disabled value = "<?php if (ISSET ($_SESSION['ETdescription']) ) echo $_SESSION['ETdescription']?>" />
			
		<!-- brand field -->
        <label for="ETbrand">Brand:</label> 
             <input type="text" name="ETbrand" placeholder = "Enter the brand of Equipment Type" title = "Ex. Black & Decker" id="ETbrand" required disabled value = "<?php if (ISSET ($_SESSION['ETbrand']) ) echo $_SESSION['ETbrand']?>" />
           			
		<!-- category field -->
		<label for="ETcategory">Category:</label>
			<input type = "text" id="ETcategory" name="ETcategory" title = "Garden Tools or DIY Tools or Others" required disabled value = "<?php if (ISSET ($_SESSION['ETcategory']) ) echo $_SESSION['ETcategory']?>" >
					
		<!-- supplier field -->
        <label for="supplier">Supplier: </label>
			<input type = "text" id="supplier" name="supplier" title = "Enter a supplier ID" onclick="selectsupplier()" required disabled value = "<?php if (ISSET ($_SESSION['supplier']) ) echo $_SESSION['supplier']?>" >
				
			
		<!-- Supplier Catalogue Code field -->
        <label for="cataloguecode">Supplier's Catalogue Code:</label>
            <input type="text" id="cataloguecode" name="cataloguecode" placeholder = "Enter the Supplier Catalogue Code for equipment type" title = "Ex. AAA0001112" pattern = "[a-zA-z]{3}[0-9]{7}" autocomplete=off required disabled value = "<?php if (ISSET ($_SESSION['cataloguecode']) ) echo $_SESSION['cataloguecode']?>" />
           
            
			
		<!-- Rental Cost per day field -->
        <label for="rentalcostperday">Rental Cost per Day:</label>
            <input type="text" id="rentalcostperday" name="rentalcostperday" placeholder = "Enter the rental cost per day for equipment type" title = "Ex. 5.00" pattern = "[0-9]+(\.[0-9][0-9]?)?" autocomplete=off required disabled value = "<?php if (ISSET ($_SESSION['rentalcostperday']) ) echo $_SESSION['rentalcostperday']?>" />
		 <div>
		 	<!-- submit, reset and back field -->
		 	<button onclick="window.location.href = 'ETmenumaintenance.php';">Back To Menu</button><br><br>				
         	<input type="reset" value="Clear all fields" name="reset" />
        	
			<!-- JavaScript to confirm submission field -->
			<script>
					document.getElementById("addETform").addEventListener("submit", function(event) {
  					var confirmation = confirm("Are you sure you want to add these details? Y/N");
  					if (!confirmation) {
    					event.preventDefault();
  						}
					});
			</script>

     		<br><br>      
     
			<input type="submit" value="Add Equipment Type" name="submit" />
		</div>
	</form>
	<?php include 'db.inc.php'; //import data base
			
			//This condition checks if the session variable is not set
        	//If the conditions are met, it echoes a message in red: no record was found for a person with the specified ID		   
			if(!ISSET($_SESSION['ETdescription']) and ISSET ($_SESSION['ETid'])	)
			{
				echo '<p Style="color: red; text-align: center; font-size:20"> No record found for an equipment type with id..' . $_SESSION['ETid'] . '<br> Please try again! </p>';
			}
				
			//After displaying the message, it unsets the variable
        	//It's useful for clearing the session variable and preparing it for the next use
			unset ($_SESSION['ETid']);
			
		
		?>
	<?php 	include "footer.php";
	?>
</body>
</html> 
    
    



