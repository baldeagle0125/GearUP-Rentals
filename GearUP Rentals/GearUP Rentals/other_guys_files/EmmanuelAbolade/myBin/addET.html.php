<!DOCTYPE html>
<!--
Name: Emmanuel Abolade
Student number: c00288657
Date: 12/02/2024
Project: c2p-equiphire
--> 
<html lang="en" id = "html"> 
<head> 
    <title>Adding Equipment Type html</title>
    <link rel ="stylesheet" href="insertET.css"/> <!--link to external style sheet called ET.css-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Set the responsive size of screen-->

	<script type="text/javascript" src="supplierselectionET.js"></script>
</head> 
<body> 
    <!--form field-->
	<form name="addETform" id="addETform" onsubmit="return validateForm()" method="post" action="insertET.php">
        <h1>ADD AN EQUIPMENT TYPE</h1> <!--Form title-->
        <fieldset class="fieldset1">
			<legend><h3>Equipment type details</h3></legend>
            
            <!-- Equipment type id field -->
            <div class="inputbox"> <!--div to style inputbox-->
                <label for="ETid">Equipment Type ID: </label> 
                    <input type="text" name="ETid" id="ETid" placeholder = "Enter the ID for the Equipment Type" Title="Ex. 010: Only numbers allowed" pattern ="[0-9]*" autocomplete=off /> 
            </div>
			
			<!-- description field -->
            <div class="inputbox"> <!--div to style inputbox-->
			<label for="ETdescription">Description: </label>
			  <input type="text" name="ETdescription" id="ETdescription" placeholder="Enter a description of the Equipment Type" Title="Ex. Cordlesss Drill" autocomplete=off required/>
			</div>
			
			<!-- brand field -->
            <div class="inputbox"> <!--div to style inputbox-->
                <label for="ETbrand">Brand:</label> 
                    <input type="text" name="ETbrand" placeholder = "Enter the brand of Equipment Type" title = "Ex. Black & Decker" id="ETbrand" required />
            </div>
			
			
			<!-- category field -->
			<div class="inputbox"> <!--div to style inputbox-->
				<label for="ETcategory">Category:</label>
				<select id="category" name="category" title = "Click to select a catagory" required>
					<option>-- Select a category --</option>
        			<option value="DIY Tools">DIY Tools</option>
        			<option value="Garden Tools">Garden Tools</option>
        			<option value="Others">Others</option>
    				</select>
			</div>		
				
				
				
				
              <!--  <label for="ETcategory">Category:</label>
                    <input type="text" id="ETcategory" name="ETcategory" placeholder="Enter category for Equipment Type" title="Ex. DIY tools" />   
            </div> -->
			
			
			<!-- supplier field -->
			<div class="inputbox"> <!--div to style inputbox-->
                <label for="supplier">Supplier: </label>
				<select id="supplier" name="supplier" title = "Click to choose a supplier" onclick="selectsupplier()" required >
					<option>-- Select a supplier --</option>
                    <?php 
						// PHP code to populate options from the supplier table
	                    include 'db.inc.php'; //include data base connection
                        
                        // Query to fetch suppliers from the database
	                    $sql = "SELECT * FROM supplier";
	                    $result = $con->query($sql);

	                    // Check if there are any suppliers
	                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['trading_name'] . '</option>';
                        }
                        } else {
                            echo '<option value="">No suppliers found</option>';
                        }
                    ?>
                </select>
				<!--<input type="text" id="supplierInput" name="supplierInput" onclick="selectsupplier()" title = "Select a supplier or Enter a supplier name in the other field">
    <!--<button type="button" onclick="selectsupplier()"></button>-->
       		</div>
			
			<!-- Supplier Catalogue Code field -->
            <div class="inputbox"> <!--div to style inputbox-->
                <label for="cataloguecode">Supplier's Catalogue Code:</label>
                    <input type="text" id="cataloguecode" name="cataloguecode" placeholder = "Enter the Supplier Catalogue Code for equipment type" title = "Ex. AAA0001112" pattern = "[a-zA-z]{3}[0-9]{7}" autocomplete=off required />
            </div>
            
			
			<!-- Cost per day field -->
            <div class="inputbox"> <!--div to style inputbox-->
                <label for="rentalcostperday">Rental Cost per Day:</label>
                    <input type="text" id="rentalcostperday" name="rentalcostperday" placeholder = "Enter the rental cost per day for equipment type" title = "Ex. 5.00" pattern = "[0-9]+(\.[0-9][0-9]?)?" autocomplete=off required />
            </div>    
			 
        
            <!-- Buttons-->
			<div class="myButton"> <!--div to style myButton-->
				<button onclick="window.location.href = 'menuETmaintenance.html';">Back to Equipment Type Maintenance Menu</button>
                <input type="submit" value="Add Equipment Type" name="submit" /><br><br> 
                <input type="reset" value="Clear all fields" name="reset" />
            </div> 
        	
			<script>
					document.getElementById("addETform").addEventListener("submit", function(event) {
  					var confirmation = confirm("Are you sure you want to add these details?");
  					if (!confirmation) {
    					event.preventDefault();
  						}
					});
			</script>

            
        </fieldset>

   </form> 
</body> 
</html> 
    
    



