
<!DOCTYPE html>
<!--
Name: Emmanuel Abolade
Student number: c00288657
Date: 12/02/2024
Project: c2p-equiphire
--> 
<html lang="en" id = "html"> 
<head> 
    <title>Deleting Equipment Type html</title>
    <link rel ="stylesheet" href="insertET.css"/> <!--link to external style sheet called ET.css-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Set the responsive size of screen-->

	<!--<script type="text/javascript" src="supplierselectionET.js"></script>-->
</head> 
<body> 
    <!--form field-->
	<form name="deleteETform" id="deleteETform" onsubmit="return validateForm()" method="post" action="delete_equipment_type.php">
        <h1>DELETE AN EQUIPMENT TYPE</h1> <!--Form title-->
        <fieldset class="fieldset1">
			<legend><h3>Equipment type details</h3></legend>
            
            <!-- Equipment type id field -->
            <div class="inputbox"> <!--div to style inputbox-->
                <label for="equipmentType">Equipment Type ID: </label> 
                    <input type="text" name="equipmentType" id="equipmentType" placeholder = "Enter the ID for the Equipment Type" Title="Ex. 010: Only numbers allowed" pattern ="[0-9]*" autocomplete=off required /> 
            </div>
			
        
            <!-- Buttons-->
			<div class="myButton"> <!--div to style myButton-->
				<button onclick="window.location.href = 'menuETmaintenance.html';">Back to Equipment Type Maintenance Menu</button>
                <input type="submit" value="Delete Equipment Type" name="submit" /><br><br> 
                <input type="reset" value="Clear all fields" name="reset" />
            </div> 
        	
			<script>
					document.getElementById("deleteETform").addEventListener("submit", function(event) {
  					var confirmation = confirm("Are you sure you want to continue?");
  					if (!confirmation) {
    					event.preventDefault();
  						}
					});
			</script>

            
        </fieldset>

   </form> 
</body> 
</html> 
    