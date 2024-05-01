<!--
**	Student:        Marvin A. Z. Santos
**	Id:	            C00288302
**	Date:			13/04/2024
**	Info:			This page holds the Custumor Payment Form and display custumer balance amount and details
**					
-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="makePaymentStlyle.css"> <!-- Link to external CSS file -->
</head>
<body>
    <!-- Include Header -->
    <?php include 'menu.php'; ?>

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- RIGHT Content - Form -->
        <section class="right-content">
            <h2>Make a Payment</h2>
			
			<!-- Informative message -->
            <h4><span style='font-size:30px;'>* </span><i>Select a Customer name from the dropdown menu below, enter the Payment Amount, and click the "Confirm Payment" button.</i></h4>
                
            <!-- Form for entering Payment Amount to Customer -->
           <form name="makePaymentForm" action="makePaymentProcess.php" onsubmit="return validateForm()" method="POST">

                <!-- Div to adjust Dropdown and Amend buttons -->
                <div class="select-wrapper">
                    <!-- Select Supplier label on the top -->
                    <label for="listbox">Select Customer:</label>
                    <!-- Include link to external PHP file to fetch/display Customer's Name for selection  -->
                    <?php include 'makePaymentListbox.php'; ?>
                    <!-- Amend/View Button -->
                </div>

                <!-- Customer Details -->
			    <h3>Customer Details:</h3>
                <div class="form-row">
                    <label for="amendid">Customer Id:</label>
                    <input type="text" name="amendid" id="amendid" class="non-interactive-input" readonly>
                </div>
                <div class="form-row">
					<label for="amendname">Name:</label>
					<input type="text" id="amendname" name="amendname" class="non-interactive-input" readonly>
				</div>
                <div class="form-row">
                    <label for="amendsurname">Surname:</label>
                    <input type="text" id="amendsurname" name="amendsurname" class="non-interactive-input" readonly>
                </div>
                <div class="form-row">
                    <label for="amendaddress">Address:</label>
                    <input type="text" id="amendaddress" name="amendaddress" class="non-interactive-input" readonly>
                </div>
                <div class="form-row">
                    <label for="amendeircode">Eircode:</label>
                    <input type="text" id="amendeircode" name="amendeircode" class="non-interactive-input" readonly>
                </div>
                <div class="form-row">
                    <label for="amendphone_no">Phone:</label>
                    <input type="email" id="amendphone_no" name="amendphone_no" class="non-interactive-input" readonly>
                </div>
			   <br>

                <!-- Payment Details input fields -->
                <h3>Payment Details:</h3>
			    <!-- Current Balance -->
                <div class="form-row">
                    <label for="amendmoney_balance">Current Balance:</label>
                    <input type="text" id="amendmoney_balance" name="amendmoney_balance" class="non-interactive-input" readonly>
                </div>
				<!-- Payment Amount -->
				<div class="form-row">
					<label for="amendcredit_limit">Payment Amount:</label>
					<input type="text" id="amendcredit_limit" name="amendcredit_limit" placeholder="Enter amount here..." title="* Payment format is integer.">	
				</div>
				<!-- Payment Date  -->
                <div class="form-row">
                    <label for="payment-date">Payment Date:</label>
                    <input  type="date" value="<?php echo date('Y-m-d'); ?>" class="non-interactive-input" readonly>
                </div>
                <!-- Payment Method radio buttons -->
				<div class="form-row">
					<label for="payment-method">Payment Method:</label>
					<label><input type="radio" name="payment_type" value="Credit Card" required>Credit Card</label>
					<label><input type="radio" name="payment_type" value="Cash" required>Cash</label>
					<label><input type="radio" name="payment_type" value="Check" required>Check</label>
				</div>
				<!-- Details input field -->
				<!-- Details input field -->
				<div class="form-row">
					<label for="payment-details">Details:</label>
					<textarea id="payment-details" name="details" placeholder="Type here..." title="* Click inside the box or tab to start typing..." class="text-input"></textarea>
				</div>
                <!-- Form Buttons Section -->
                 <div class="button-group">
					<input class="button" type="reset" value="Cancel">
					<input class="button" type="submit" value="Confirm Payment" id="submitButton" onclick="return confirmCheck()">
				</div>

            </form>
        </section>
    </div>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript function for populating details, toggling lock, and confirming changes -->
    <script>
	 	function populate() 
		{
			var sel = document.getElementById("listbox");
			var result = sel.options[sel.selectedIndex].value;
			var personDetails = result.split(',');
			document.getElementById("amendid").value = personDetails[0]; // Set customer ID
			document.getElementById("amendname").value = personDetails[1];
			document.getElementById("amendsurname").value = personDetails[2];
			document.getElementById("amendaddress").value = personDetails[3];
			document.getElementById("amendeircode").value = personDetails[4];
			document.getElementById("amendphone_no").value = personDetails[5];
			document.getElementById("amendcredit_limit").value = personDetails[6];
			document.getElementById("amendmoney_balance").value = personDetails[7];
		}
		// Function for confirming changes 
        function confirmCheck() 
		{
            var response = confirm('Are you sure you want to Make a Payment (Y/N)?');
            return response;
        }

        // Call populate() function when the selection changes
        document.getElementById("listbox").onchange = function() 
		{
            populate();
        };
		// JavaScript function validate Payment Input fields 
		function validateForm() 
		{
			// Retrieve the payment amount input field value
			var paymentAmount = document.getElementById("amendcredit_limit").value;
        
			// Convert paymentAmount to a number
			var amount = parseFloat(paymentAmount);
        
			// Check if the amount has been entered
			if ( isNaN(amount)) 
			{
				// Display an error message
				alert("Payment amount must entered!");

				// Prevent form submission
				return false;
			}
			else if (amount <= 0) 
			{
				// Display an error message
				alert("Payment amount must be greater than 0.");

				// Prevent form submission
				return false;
			}
        
			// If validation passes, allow form submission
			return true;
    	}
		
    </script>
</body>
</html>
