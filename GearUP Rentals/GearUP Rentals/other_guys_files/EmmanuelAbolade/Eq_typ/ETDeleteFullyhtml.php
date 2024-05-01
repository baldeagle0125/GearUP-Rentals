<?php
	session_start();
?>
<!--
Name: Emmanuel Abolade
Student number: c00288657
Date: 12/02/2024
Project: c2p-equiphire
Task: Writing the program for ETDeleteFullyhtml.php
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleting Fully</title>
	<link rel="stylesheet" type="text/css" href="menu.css">
    <script>
        function deleteRecord() {
            var delid = document.getElementById("listbox").value;
            var confirmed = confirm("Are you sure you want to delete this record?");
            if (confirmed) {
                window.location = "ETDeleteFully.php?delid=" + delid;
            }
        }
    </script>
</head>
<body class="ETmenu">
	<?php include "menu.php"; // Includes menu navigation ?> 
	
	
	
	
	
	<?php
			if (ISSET($_SESSION["ETid"])) { echo "<div class='container'><br><h3 class='myMessage'>Record deleted for ".
				$_SESSION["description"] . " " . $_SESSION["brand"]. "</h3></div>" ;}
			session_destroy();																											
	?>
	
	<!-- Container div to group and organize content -->
	<div class="delcontainer">
		
	  <h1>Delete an Equipment Type</h1><br>
	  <h4>Please select an Equipment type and then click the delete button.</h4><br>

	  <!-- Include PHP file to generate the equipment type selection list -->
	  <?php include 'ETdeletelistbox.php'; ?>

	  <!-- JavaScript functions for populating details, toggling lock, and confirming changes -->
	  <script>
	  
		// Function to populate details based on the selected equipment type
		function populate()
		{
		  var sel = document.getElementById("listbox");
		  var result;
		  result = sel.options[sel.selectedIndex].value;
		  var ETDetails = result.split('|');
		  document.getElementById("display").innerHTML = "The details of the selected Equipment Type are: "+ result;
		  document.getElementById("delid").value = ETDetails[0];
		  document.getElementById("deldescription").value = ETDetails[1];
		  document.getElementById("delbrand").value = ETDetails[2];
		  document.getElementById("delcategory").value = ETDetails[3];
		  document.getElementById("delsupplier").value = ETDetails[4];
		  document.getElementById("delcataloguecode").value = ETDetails[5];
		  document.getElementById("delcostperday").value = ETDetails[6];
		  document.getElementById("delnumavailable").value = ETDetails[7];
		  document.getElementById("delnumonhire").value = ETDetails[8];
		}

		// Function to confirm changes with a prompt
		function confirmCheck()
		{
		  var response;
		  response = confirm('Are you sure you want to delete this equipment type?');

		  if(response)
		  {
			document.getElementById("delid").disabled = false;
			document.getElementById("deldescription").disabled = false;
			document.getElementById("delbrand").disabled = false;
			document.getElementById("delcategory").disabled = false;
			document.getElementById("delsupplier").disabled = false;
			document.getElementById("delcataloguecode").disabled = false;
			document.getElementById("delcostperday").disabled = false;
			document.getElementById("delnumavailable").disabled = false;
			document.getElementById("delnumonhire").disabled = false;
			return true;
		  }
		  else // Otherwise populate the fields back
		  {
			populate();
			return false;
		  }
		}
	  </script>

	  <!-- Display details -->
	  <p id="display"></p>

	  <!-- Form for editing person details with input fields and submission button -->
	  <form name="deleteForm" id="deleteviewform" action="ETdelete.php" onsubmit="return confirmCheck()" method="POST">
		<br>  

		<!-- Input field for Equipment type Id -->
		<label for="delid">Equipment Type Id: </label>
		<input type="text" name="delid" id="delid" disabled><br>

		<!-- Input field for description -->
		<label for="deldescription">Description: </label>
		<input type="text" name="deldescription" id="deldescription" disabled><br>

		<!-- Input field for brand -->
		<label for="delbrand">Brand: </label>
		<input type="text" name="delbrand" id="delbrand" disabled><br>

		<!-- Input field for category -->
		<label for="delcategory">Category: </label>
		<input type="text" name="delcategory" id="delcategory" title="Use format dd-mm-yyyy" disabled>
		 <!-- Input field for supplier -->
		<label for="delsupplier">Supplier ID: </label>
		<input type="text" name="delsupplier" id="delsupplier" disabled><br>

		<!-- Input field for catalogue code -->
		<label for="delcataloguecode">Supplier Catalogue Code: </label>
		<input type="text" name="delcataloguecode" id="delcataloguecode" disabled><br>

		<!-- Input field for cost per day -->
		<label for="delcostperday">Rental Cost per day: </label>
		<input type="text" name="delcostperday" id="delcostperday" disabled><br>

		<!-- Input field for Quantity of item -->
		<label for="delnumavailable">Quantity of Items: </label>
		<input type="text" name="delnumavailable" id="delnumavailable" title="Use format dd-mm-yyyy" disabled>
		<!-- Input field for Date of Birth -->
		<label for="delnumonhire">Quantity on Hire: </label>
		<input type="text" name="delnumonhire" id="delnumonhire" title="Use format dd-mm-yyyy" disabled>
		<br><br>
		
		
		 
		 <div>
			 <a class="button" href="ETmenumaintenance.php">Back To Menu</a>
		 	<!-- submit, reset and back field -->
		 	<!--button name="back" onclick="window.location.href= 'ETmenumaintenance.php';">Back To Menu</button--><br><br>				
         	<input type="reset" value="Clear all fields" name="reset" />
        	
			<!-- Submission button for saving changes -->
			<input type="submit" value="Delete the record" name="submit">
			
		</div>
		  
		  
		  
		  
		  
		  
		  
	  </form>
	</div>
	
</body>
<?php include "footer.php"; // Includes footer 
	
	?>
</html>
