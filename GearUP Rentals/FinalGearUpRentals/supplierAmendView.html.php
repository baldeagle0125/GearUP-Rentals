<!--
** 		Student:    Marvin A. Z. Santos
**    	Id:         C00288302
**		Date:		This page serves as a platform for viewing and modifying supplier details
** 					
-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainStyle.css"> <!-- Link to external CSS file -->

</head>
<body>
    <!-- Include Header -->
    <?php include 'menu.php'; ?>

    <!-- Main Content Area -->
    <div class="main-content">
        
        <!-- LEFT Content - Submenu 
        <aside class="left-content">
			php include 'supplierSubmenu.html.php'; ?>
            
        </aside>
        
        <!-- RIGHT Content - Form -->
        <section class="right-content">
			
			<h2>Amend/View a Supplier</h2>
			<h4 class="subtitle-info"><span style='font-size:30px;'>* </span><i>Select a supplier name from the dropdown menu below and click the "Amend" button to modify the details, then the "Save" button to confirm.</i></h4>
				
			<!-- Form for editing person details with input fields and submission button -->
				<form name="supplierAmendForm" action="supplierAmendView.php" onsubmit="return confirmCheck()" method="POST">

				<!-- Div to adjust Dropdown and Amend buttons -->
				<div class="select-wrapper">
					<!-- Select Supplier label on the top -->
					<label for="listsbox">Select Supplier: </label>
					
					<!-- Include button to display Supplier's Name for selection  -->
					<?php include 'supplierListbox.php'; ?>
					<!-- Amend/View Button -->
					<input class="button" type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">
				</div>
				
			<!-- JavaScript functions for populating details, toggling lock, and confirming changes -->
			<script>

				// Function to populate details based on the selected person
				function populate()
				{
					var sel = document.getElementById("listbox");
					var result;
					result = sel.options[sel.selectedIndex].value;
					var personDetails = result.split(',');
					document.getElementById("amendId").value = personDetails[0];
					document.getElementById("amendTradingName").value = personDetails[1];
					document.getElementById("amendAddress").value = personDetails[2];
					document.getElementById("amendEircode").value = personDetails[3];
					document.getElementById("amendPhoneNo").value = personDetails[4];
					document.getElementById("amendEmail").value = personDetails[5];
					document.getElementById("amendWebsite").value = personDetails[6];
				}

				// Function to toggle input field lock and change button label
				function toggleLock()
				{
					if(document.getElementById("amendViewbutton").value =="Amend Details")
					{
						document.getElementById("amendTradingName").disabled = false;
						document.getElementById("amendAddress").disabled = false;
						document.getElementById("amendEircode").disabled = false;
						document.getElementById("amendPhoneNo").disabled = false;
						document.getElementById("amendEmail").disabled = false;
						document.getElementById("amendWebsite").disabled = false;
						document.getElementById("amendViewbutton").value ="View Details";
					}
					else
					{
						document.getElementById("amendTradingName").disabled = true;
						document.getElementById("amendAddress").disabled = true;
						document.getElementById("amendEircode").disabled = true;
						document.getElementById("amendPhoneNo").disabled = true;
						document.getElementById("amendEmail").disabled = true;
						document.getElementById("amendWebsite").disabled = true;
						document.getElementById("amendViewbutton").value ="Amend Details";
					}
				}

				// Function to confirm changes with a prompt
				function confirmCheck()
				{
					var response;
					response = confirm('Are you sure you want to amend these changes (Y/N)?');

					if(response)
					{
						document.getElementById("amendId").disabled = false;
						document.getElementById("amendTradingName").disabled = false;
						document.getElementById("amendAddress").disabled = false;
						document.getElementById("amendEircode").disabled = false;
						document.getElementById("amendPhoneNo").disabled = false;
						document.getElementById("amendEmail").disabled = false;
						document.getElementById("amendWebsite").disabled = false;
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
			 
				<!-- Input field for Person Id -->
				<div class="form-row">
					<label for="amendId">Supplier Id: </label>
					<input type="text" name="amendId" id="amendId" disabled><br>
				</div>
				<!-- Supplier Trading Name input -->
				<div class="form-row">
					<label for="amendTradingName">Trading Name:</label>
					<input type="text" id="amendTradingName" name="amendTradingName" placeholder="Type here..." pattern="[A-Za-z&\s]+" title="Alphabetic characters, '&' and spaces only" disabled><br>
				</div>
				<!-- Supplier Address input -->
				<div class="form-row">
					<label for="amendAddress">Address:</label>
					<input type="text" id="amendAddress" name="amendAddress" placeholder="Type here..." pattern="[A-Za-z0-9\s\-,.]+" title="Alphanumeric characters, spaces, hyphens, commas, and periods only" disabled><br>
				</div>
				<!-- Supplier Eircode input-->
				<div class="form-row">
					<label for="amendEircode">Eircode:</label>
					<input type="text" id="amendEircode" name="amendEircode" placeholder="Type here..." pattern="[A-NP-Z0-9]{7}" title="Use capital letters and numbers only. *Do not use the letter 'O'." disabled><br>
				</div>

				<!-- Supplier Phone Number input -->
				<div class="form-row">
					<label for="amendPhoneNo">Phone Number:</label>
					<input type="text" id="amendPhoneNo" name="amendPhoneNo" pattern="[0-9\s()-]+" placeholder="Type here..." title="Digits, parentheses, spaces, and hyphens only"  disabled>
				</div>

				<!-- Email Address input -->
				<div class="form-row">
					<label for="amendEmail">Email:</label>
					<input type="email" id="amendEmail" name="amendEmail" placeholder="Type here..." title="Examplo@mail.com" disabled>
				</div>

				<!-- Web Address input -->
				<div class="form-row">
					<label for="amendWebsite">Website:</label>
					<input type="text" id="amendWebsite" name="amendWebsite"  placeholder="Type here..." title="Alphabetic characters only." disabled>
				</div>
				<br>
				<!-- Form Buttons Section -->
				<div class="button-group">
					 <a class=button href="supplierSubmenu.html.php">Back To Menu</a>
					<input class="button" type="reset" value="Cancel">
					<input class="button" type="submit" value="Save Changes">
				</div>

			</form>
			
        </section>
		
    </div>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>

</body>
</html>
