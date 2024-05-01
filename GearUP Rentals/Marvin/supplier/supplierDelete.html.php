<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Link to external CSS file -->
    <link rel="stylesheet" href="../mainStyle.css">

</head>
<body>

    <!-- Main Content Area -->
    <div class="main-content">
        
        <!-- RIGHT Content - Form -->
        <section class="right-content">
			<!-- DELETE Supplier -->
					<h2>Delete a Supplier</h2>
					<h4 class="subtitle-info"><span style='font-size:30px;'>* </span><i>Select a supplier name from the dropdown menu below and proceed by clicking the "Delete" button to remove it from the list.</i></h4><br>

					<!-- Form for editing person details with input fields and submission button -->
					<form name="deleteForm" action="supplierDelete.php" onsubmit="return confirmCheck()" method="POST">
					
					<!-- Div to adjust Dropdown and Amend buttons -->
					<div class="select-wrapper">
						<!-- Select Supplier label on the top -->
						<label for="listsbox">Select Supplier: </label>

						<!-- Include button to display Supplier's Name for selection  -->
						<?php include 'supplierListbox.php'; ?>
					</div><br>

					<!-- JavaScript functions for populating details, toggling lock, and confirming changes -->
					<script>

						// Function to populate details based on the selected person
						function populate()
						{
							var sel = document.getElementById("listbox");
							var result;
							result = sel.options[sel.selectedIndex].value;
							var personDetails = result.split(',');
							document.getElementById("delId").value = personDetails[0];
							document.getElementById("delTradingName").value = personDetails[1];
							document.getElementById("delAddress").value = personDetails[2];
							document.getElementById("delEircode").value = personDetails[3];
							document.getElementById("delPhoneNo").value = personDetails[4];
							document.getElementById("delEmail").value = personDetails[5];
							document.getElementById("delWebsite").value = personDetails[6];
						}

						// Function to confirm changes with a prompt
						function confirmCheck()
						{
							var response;
							response = confirm('Are you sure you want to delete this Supplier? (Y/N)');

							if(response)
							{
								document.getElementById("delId").disabled = false;
								document.getElementById("delTradingName").disabled = false;
								document.getElementById("delAddress").disabled = false;
								document.getElementById("delEircode").disabled = false;
								document.getElementById("delPhoneNo").disabled = false;
								document.getElementById("delEmail").disabled = false;
								document.getElementById("delWebsite").disabled = false;
								return true;
							}
							else // Otherwise populate the fields back
							{
								populate();
								return false;
							}
						}
					</script>

					<!-- Input field for Supplier Id -->
					<div class="form-row">
						<label for="delId">Supplier Id: </label>
						<input type="text" name="delId" id="delId" disabled>
					</div>

					<!-- Input field for Trading Name -->
					<div class="form-row">
						<label for="delTradingName">Trading Name: </label>
						<input type="text" name="delTradingName" id="delTradingName" disabled>
					</div>

					<!-- Input field for Address -->
					<div class="form-row">
						<label for="delAddress">Address: </label>
						<input type="text" name="delAddress" id="delAddress" disabled>
					</div>

					<!-- Input field for Eircode -->
					<div class="form-row">
						<label for="delEircode">Eircode: </label>
						<input type="text" name="delEircode" id="delEircode" disabled>
					</div>

					<!-- Input field for Phone -->
					<div class="form-row">
						<label for="delPhoneNo">Phone: </label>
						<input type="text" name="delPhoneNo" id="delPhoneNo" disabled>
					</div>

					<!-- Input field for Email -->
					<div class="form-row">
						<label for="delEmail">Email: </label>
						<input type="text" name="delEmail" id="delEmail" disabled>
					</div>

					<!-- Input field for Website -->
					<div class="form-row">
						<label for="delWebsite">Website: </label>
						<input type="text" name="delWebsite" id="delWebsite" disabled>
					</div>
					
					<br>
					<!-- Form Buttons Section -->
					<div class="button-group">
						<input class="button" type="reset" value="Cancel">
						<input class="button" type="submit" value="Delete Supplier">
					</div>

				</form>
        </section>
		
    </div>

</body>
</html>
