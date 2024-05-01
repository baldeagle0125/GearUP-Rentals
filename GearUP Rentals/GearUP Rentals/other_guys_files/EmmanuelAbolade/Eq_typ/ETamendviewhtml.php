<!DOCTYPE html>
<!--
Name: Emmanuel Abolade
Student number: c00288657
Date: 12/02/2024
Project: c2p-equiphire
Task: Writing the program for ETamendviewhtml.php
-->
<?php include "menu.php"; ?>
<html lang="en"> 
<head> 
    <title>To view and Amend Equipment Type</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Set the responsive size of screen-->
	<link rel ="stylesheet" href="menu.css"/> <!--link to external style sheet called ET.css-->
	<script type="text/javascript" src="ETsupplierlist.js"></script>
</head>
<body class = "ETmenu">
	
	<!-- Container div to group and organize content -->
	<div class="container">	
	  <h1>Amend/View An Equipment Type</h1>
	  <h4>Please select an equipment type and then click the Amend Button if you wish to update </h4>

	  <!-- Include PHP file to generate the equipment type selection list -->
	  <?php include 'ETamendlistbox.php'; 
		include 'db.inc.php';
	  	date_default_timezone_set('UTC');
	  ?>
	  <!-- JavaScript functions for populating details, toggling lock, and confirming changes -->
	  <script>
	  
		// Function to populate details based on the selected equipment type
		function populate()
		{
		  var sel = document.getElementById("listbox");
		  var result;
		  result = sel.options[sel.selectedIndex].value;
		  var ETDetails = result.split('/');
		  	document.getElementById("display").innerHTML = "The details of the selected equipment type are: "+ result;
		  	document.getElementById("amendid").value = ETDetails[0];
		  	document.getElementById("amenddescription").value = ETDetails[1];
		  	document.getElementById("amendbrand").value = ETDetails[2];
		  	document.getElementById("amendcategory").value = ETDetails[3];
		  	document.getElementById("amendsupplier").value = ETDetails[4];
			document.getElementById("amendcataloguecode").value = ETDetails[5];
			document.getElementById("amendrentalcost").value = ETDetails[6];
		}

		// Function to toggle input field lock and change button label
		function toggleLock()
		{
		  if(document.getElementById("amendViewbutton").value =="Amend Details")
		  {
			document.getElementById("amenddescription").disabled = false;
			document.getElementById("amendbrand").disabled = false;
			document.getElementById("amendcategory").disabled = false;
			document.getElementById("amendsupplier").disabled = false;
			document.getElementById("amendcataloguecode").disabled = false;
			document.getElementById("amendrentalcost").disabled = false;
			document.getElementById("amendViewbutton").value ="View Details";
			
		  }
		  else
		  {
			document.getElementById("amenddescription").disabled = true;
			document.getElementById("amendbrand").disabled = true;
			document.getElementById("amendcategory").disabled = true;
			document.getElementById("amendsupplier").disabled = true;
			document.getElementById("amendcataloguecode").disabled = true;
			document.getElementById("amendrentalcost").disabled = true;
			document.getElementById("amendViewbutton").value ="Amend Details";
		  }
		}

		// Function to confirm changes with a prompt
		function confirmCheck()
		{
		  var response;
		  response = confirm('Are you sure you want to save these changes?');

		  if(response)
		  {
			document.getElementById("amendid").disabled = false;
			document.getElementById("amenddescription").disabled = false;
			document.getElementById("amendbrand").disabled = false;
			document.getElementById("amendcategory").disabled = false;
			document.getElementById("amendsupplier").disabled = false;
			document.getElementById("amendcataloguecode").disabled = false;
			document.getElementById("amendrentalcost").disabled = false;
			return true;
		  }
		  else
		  {
			populate();
			toggleLock();
			return false;
		  }
		}
	  </script>
		<br><br><br>
	  <!-- Display details and button for toggling input field lock -->
	  <p id="display"></p>
	  <input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">
		
	  <!-- Form for editing equipment type details with input fields and submission button -->
	  <form id="amendviewform" name="myForm" action="ETamendview.php" onsubmit="return confirmCheck()" method="POST">
		<br>  

		<!-- Input field for Equipment Type Id -->
		<label for="amendid">Equipment Type Id: </label>
		<input type="text" name="amendid" id="amendid" pattern ="[0-9]*" placeholder = "Enter ID for Equipment Type" Title="Ex. 010: Only numbers allowed" autocomplete=off disabled><br>

		<!-- Input field for Description -->
		<label for="amenddescription">Description: </label>
		<input type="text" name="amenddescription" id="amenddescription" placeholder="Enter a description of Equipment Type" Title="Ex. Cordlesss Drill" autocomplete=off required disabled><br>

		<!-- Input field for Brand -->
		<label for="amendbrand">Brand: </label>
		<input type="text" name="amendbrand" id="amendbrand" placeholder = "Enter brand of Equipment Type" title = "Ex. Black & Decker" id="ETbrand" required disabled><br>

		<!-- Input field for Category -->
		<label for="amendcategory">Category: </label>
		<input type="text" name="amendcategory" id="amendcategory" placeholder = "Enter a category for Equipment Type" title = "DIY Tools or Garden Tools or Others" required disabled>
		  
		<!-- Input field for Supplier -->
		<label for="amendsupplier">Supplier ID: </label>
		<input type="text" name="amendsupplier" id="amendsupplier" title = "Ex. 10"  pattern ="[0-9]*" placeholder = "Enter supplier ID of Equipment Type" required autocomplete=off disabled><br>
		  
		<!-- Input field for Supplier’s Catalogue Code -->
		<label for="amendcataloguecode">Supplier Catalogue Code: </label>
		<input type="text" name="amendcataloguecode" id="amendcataloguecode" placeholder = "Enter the Supplier Catalogue Code for equipment type" title = "Ex. AAA0001112" pattern = "[a-zA-z]{3}[0-9]{7}" autocomplete=off autocomplete=off disabled><br>
				
		<!-- Input field for Rental Cost per Day -->
		<label for="amendrentalcost">Rental Cost per day: </label>
		<input type="text" name="amendrentalcost" id="amendrentalcost" placeholder = "Enter the rental cost per day for equipment type" title = "Ex. 5.00" pattern = "[0-9]+(\.[0-9][0-9]?)?" autocomplete=off autocomplete=off disabled><br>
		 
		
	  <div>
		 	<!-- submit, reset and back field -->
		 	<!--button onclick="window.location.href = 'ETmenumaintenance.php';">Back To Menu</button-->			
		  <a class=button href="ETmenumaintenance.php">Back To Menu</a>
         	<input type="reset" value="Clear all fields" name="reset" />
        	
			<!-- Submission button for saving changes -->
		<input type="submit" name="submit" value="Save Changes">
			<!--input type="submit" value="Add Equipment Type" name="submit" /-->
		</div>
		  
		  
		  
	</form>  
	
  </div>
	
</body>
<?php 	include "footer.php";
	?>
</html>