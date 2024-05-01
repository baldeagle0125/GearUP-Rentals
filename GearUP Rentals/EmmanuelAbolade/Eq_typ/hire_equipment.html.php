<!--include menu.php, database and set the default for time-->
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
--> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiring of Equipment</title>
    <link rel ="stylesheet" href="menu.css"/> <!--link to external style sheet called ET.css-->
	<script type="text/javascript" src="ETstafflist.js"></script>
</head>
<body>
    <div class="container">
        <h1>Hiring of Equipment</h1>
        <form name = "hireform" action="ETaddhire.php" method="POST" onsubmit="validateForm()"  >
            <label for="staff">Select Staff Member:</label>
            <select name="staff" id="staff" title = "Click to choose a staff" onclick="selectstaff()" required>
				<option>-- Select a staff --</option>
                <!-- PHP code to populate options from the staff table -->
            <?php 
						//include data base connection
	                    include 'db.inc.php'; 
                        
                        // Query to fetch staff from the database
	                    $sql = "SELECT * FROM staff";
	                    
						$result = $con->query($sql);

	                    // Check if there are any staff
	                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . " " . $row['surname'] . " " . $row['name'] . " - " . $row['job_title'] .'</option>';}
                        } else {
                            echo '<option value="">No staff found</option>';}
                    ?>
           	</select>
            
            <label for="customer">Select Customer:</label>
            <select name="customer" id="customer" title = "Click to choose a customer" onclick = "selectcustomer()" required>
                <option>-- Select a customer --</option>
				<!-- PHP code to populate options from the customer table -->
            <?php 
						//include data base connection
	                    include 'db.inc.php'; 
                        
                        // Query to fetch staff from the database
	                    $sql = "SELECT * FROM customer";
	                    
						$result = $con->query($sql);

	                    // Check if there are any customer
	                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' ." " . $row['surname'] . " " . $row['name'] . " - " . $row['money_balance'] .'</option>';}
                        } else {
                            echo '<option value="">No customer found</option>';}
                    ?>
           	</select>
            
            <label for="equipment_type">Equipment Type Description:</label>
            <select type="text" name="equipment_type" id="equipment_type" title = "Choose a description" onclick = "selectdescription()" ><br>
				<option>-- Select a description --</option>
				<!-- PHP code to populate options from the customer table -->
            <?php 
						//include data base connection
	                    include 'db.inc.php'; 
                        
                        // Query to fetch staff from the database
	                    $sql = "SELECT * FROM equipment_type";
	                    
						$result = $con->query($sql);

	                    // Check if there are any customer
	                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . " " . $row['description'] . " " . $row['category'] .'</option>';}
                        } else {
                            echo '<option value="">No description found</option>';}
                    ?>
           	</select>
            
            <!-- Additional details from Equipment Information will be displayed dynamically -->

            <label for="num_days">Number of Days:</label>
            <input type="number" name="num_days" id="num_days"><br>
			
			<label for="num_items">Number of Equipment items:</label>
            <input type="number" name="num_items" id="num_items"><br>

            <!-- Option to make a payment or add to customer's account balance -->
            <label for="payment">Make Payment:</label>
            <input type="checkbox" name="payment" id="payment"><br>
			
			<!-- submitand reset field -->
			<input type="reset" value="Clear all fields" name="reset" />
            <input type="submit" value="Submit" name="Submit" onclick="validateForm()"  >
            <!-- JavaScript to confirm submission field -->
			<script>
					document.getElementById("hireform").addEventListener("Submit", function(event) {
  					var confirmation = confirm("Are you sure you want to continue? Y/N");
  					if (!confirmation) {
    					event.preventDefault();
  						}
					});
			</script>

        </form>
    </div>
    <script src="ETstafflist.js"></script>
	
</body>
</html>
