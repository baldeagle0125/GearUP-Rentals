<!--
** 		Student:    Marvin A. Z. Santos
**    	Id:         C00288302
**		Date:		12/04/2024
**		Info:		This page is for adding a new supplier by filling in the required information in the form provided,
** 					and submitting it for confirmation
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../mainStyle.css"> <!-- Link to external CSS file -->
	<script src="supplierScript.js"></script>  <!-- Link to external JavaScript Validation Page -->
    
</head>
<body>
    
    <!-- Main Content Area -->
    <div class="main-content">
        
        <!-- RIGHT Content - Form -->
        <section class="right-content">
            <h2>Add New Supplier</h2>
            <!-- Informative message for the user -->
            <h4 class="subtitle-info"><span style='font-size:30px;'>* </span><i> Fill in the desired information below to add a new supplier, and then proceed by clicking the "Add" button to confirm your submission.</i></h4><br>
            
            <!-- Supplier Add Form -->
            <form action="supplierAdd.php" method="POST" onsubmit="return validateSupplierAddForm()">

                <!-- Supplier Trading Name input -->
				<div class="form-row">
					<label for="supplierTradingName">Trading Name:</label>
					<input type="text" id="supplierTradingName" name="supplierTradingName" placeholder="Type here..." pattern="[A-Za-z&\s]+" title="Alphabetic characters, '&' and spaces only" required>
				</div>


                <!-- Supplier Address input -->
				<div class="form-row">
					<label for="supplierAddress">Address:</label>
					<input type="text" id="supplierAddress" name="supplierAddress" placeholder="Type here..." pattern="[A-Za-z0-9\s\-,.]+" title="Alphanumeric characters, spaces, hyphens, commas, and periods only" required>
				</div>


                <!-- Supplier Eircode input-->
                <div class="form-row">
                    <label for="supplierEircode">Eircode:</label>
                    <!-- Pattern for valid Eircode format -->
                    <input type="text" id="Eircode" name="supplierEircode" placeholder="Type here..." placeholder="Ex: A65F4E2" pattern="[A-NP-Z0-9]{7}" title="Use format R931234  a letter plus 6 digits." required>
                </div>

                <!-- Supplier Phone Number input -->
				<div class="form-row">
					<label for="supplierPhone">Phone Number:</label>
					<input type="text" id="supplierPhone" name="supplierPhone" pattern="[0-9\s()-]+" placeholder="Type here..." title="Digits, parentheses, spaces, and hyphens only" >
				</div>


                <!-- Email Address input -->
                <div class="form-row">
                    <label for="supplierEmail">Email:</label>
                    <input type="email" id="supplierEmail" name="supplierEmail" placeholder="Type here..." title="Examplo@mail.com">
                </div>

                <!-- Web Address input -->
                <div class="form-row">
                    <label for="supplierWebsite">Web Address:</label>
                    <input type="text" id="supplierWebsite" name="supplierWebsite" placeholder="Type here..." title="Alphabetic characters only.">
                </div>
                <br>
                <!-- Form Buttons Section -->
                <div class="button-group">
                    <input class="button" type="reset" value="Cancel">
                    <input class="button" type="submit" value="Add Supplier">
				</div>
            </form>
        </section>
    </div>


</body>
</html>
