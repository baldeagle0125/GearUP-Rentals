

<!-- 
** Template to be used in different pages 
** Has to be linked to the supplierStyle.css file for Styling
** 
-->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainStyle.css"> <!-- Link to external CSS file -->
	
	<!-- Include Header -->
    <?php include 'navigationMenu.php'; ?>
</head>
<body>
    

    <!-- Main Content Area -->
    <div class="main-content">
        
        <!-- LEFT Content - Submenu -->
        <aside class="left-content">
			<!-- Include Supplier Add, Delete, Amend/View submenu -->
			<?php include 'supplierSubmenu.html.php'; ?>
            
        </aside>
        
        <!-- RIGHT Content - Form -->
        <section class="right-content">
			<h2>Add New Supplier</h2>
			<h4 class="subtitle-info"><span style='font-size:30px;'>* </span><i> Fill in the desired information below to add a new supplier, and then proceed by clicking the "Add" button to confirm your submission.</i></h4><br>
			
			<form action="supplierAdd.php" method="POST" onsubmit="return validateSupplierAddForm()">

				<!-- Supplier Trading Name input -->
				<div class="form-row">
					<label for="supplierTradingName">Trading Name:</label>
					<input type="text" id="supplierTradingName" name="supplierTradingName" required>
				</div>

				<!-- Supplier Address input -->
				<div class="form-row">
					<label for="supplierAddress">Address:</label>
					<input type="text" id="supplierAddress" name="supplierAddress" required>
				</div>

				<!-- Supplier Eircode input-->
				<div class="form-row">
					<label for="supplierEircode">Eircode:</label>
					<input type="text" id="Eircode" name="supplierEircode" placeholder="Ex: A65F4E2" pattern="[A-NP-Z0-9]{7}" title="Use capital letters and numbers only. *Do not use the letter 'O'." required>
				</div>

				<!-- Supplier Phone Number input -->
				<div class="form-row">
					<label for="supplierPhone">Phone Number:</label>
					<input type="text" id="supplierPhone" name="supplierPhone" pattern="[0-9\s]+" title="Digits and spaces only">
				</div>

				<!-- Email Address input -->
				<div class="form-row">
					<label for="supplierEmail">Email:</label>
					<input type="email" id="supplierEmail" name="supplierEmail" title="Examplo@mail.com">
				</div>

				<!-- Web Address input -->
				<div class="form-row">
					<label for="supplierWebsite">Web Address:</label>
					<input type="text" id="supplierWebsite" name="supplierWebsite" title="Alphabetic characters...">
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

    <!-- Include Footer -->
    <?php include '../footer.php'; ?>

</body>
</html>
