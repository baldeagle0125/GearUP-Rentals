<?PHP
//AUTHOR: IHOR ANTONOV
//STUDENT ID: C00291296
//DATE: 11/04/2024
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="content">
        <h1> Amend/View a Customer</h1>
        <strong> Please select a person and then click the Edit button if you wish to Edit </strong>
    <?php include 'delete_listbox.php'; ?>
    <script>
        function populate()
        {
            var sel = document.getElementById("listbox");
            var result;
            result = sel.options[sel.selectedIndex].value;
            var personDetails = result.split(',');
            //id, surname, name, address, eircode, phone_no, credit_limit, money_balance
            document.getElementById("amendid").value = personDetails[0];
            document.getElementById("amendsurname").value = personDetails[1];
            document.getElementById("amendname").value = personDetails[2];
            document.getElementById("amendaddress").value = personDetails[3];
            document.getElementById("amendeircode").value = personDetails[4];
            document.getElementById("amendphone_no").value = personDetails[5];
            document.getElementById("amendcredit_limit").value = personDetails[6];
            document.getElementById("amendmoney_balance").value = personDetails[7];
        }
        function toggleLock()
        {
            if(document.getElementById('amendViewbutton').value == "Amend Details")
            {
            document.getElementById("amendsurname").disabled = false;
            document.getElementById("amendname").disabled = false;
            document.getElementById("amendaddress").disabled = false;
            document.getElementById("amendeircode").disabled = false;
            document.getElementById("amendphone_no").disabled = false;
            document.getElementById("amendcredit_limit").disabled = false;
            document.getElementById("submitButton").disabled = false;
                document.getElementById("amendViewbutton").value = "View Details";
            }
            else 
            {
            document.getElementById("amendsurname").disabled = true;
            document.getElementById("amendname").disabled = true;
            document.getElementById("amendaddress").disabled = true;
            document.getElementById("amendeircode").disabled = true;
            document.getElementById("amendphone_no").disabled = true;
            document.getElementById("amendcredit_limit").disabled = true;
            document.getElementById("submitButton").disabled = true;
                document.getElementById("amendViewbutton").value = "Amend Details";
            }

        }
        function confirmCheck()
        {
            var response;
            response = confirm('Are you sure you want to amend this customer?');
            return response;
        }

        
        </script>
        <script src=filternames.js></script>
        <p>
        <input type="text" id="searchbox">
        <a id="searchbutton" class="button" onclick="filterNamesBySearch()"> Filter Names </a>
        <input type="button" id="amendViewbutton" class="button" onclick="toggleLock()" value="Amend Details">
    </p>

        <form name="myForm" action="amendView.php" onsubmit="return confirmCheck()" method="POST">
        <p>
            <label for="amendid">Person Id</label>
            <input type="text" name="amendid" id="amendid" readonly>
        </p>
        <p>
            <label for="amendsurname">Sur Name</label>
            <input type="text" name="amendsurname" id="amendsurname" disabled>
        </p>
        <p>
            <label for="amendname">Name</label>
            <input type="text" name="amendname" id="amendname" disabled>
        </p>
        <p>
            <label for="amendaddress">Address</label>
            <input type="text" name="amendaddress" id="amendaddress" disabled>
        </p>
        <p>
            <label for="amendeircode">Eircode</label>
            <input type="text" name="amendeircode" id="amendeircode" disabled>
        </p>
        <p>
            <label for="amendphone_no">Phone Number</label>
            <input type="text" name="amendphone_no" id="amendphone_no" disabled>
        </p>
        <p>
            <label for="amendcredit_limit">Credit Limit</label>
            <input type="text" name="amendcredit_limit" id="amendcredit_limit" disabled>
        </p>
        <p>
            <label for="amendmoney_balance">Money Balance</label>
            <input type="text" name="amendmoney_balance" id="amendmoney_balance" readonly>
        </p>

            <br><br>

            <input type="submit" id="submitButton" value="Save Changes" class=button disabled>
            <a class=button href="./customer_menu.html">Back to Menu</a>
    </form>
    </div>

    </body>

    </html>


