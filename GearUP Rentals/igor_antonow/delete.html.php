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
        <h1> Delete a Customer</h1>
        <strong> Please select a person and then click the Delete button if you wish to delete </strong>
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
        function confirmCheck()
        {
            var response;
            response = confirm('Are you sure you want to delete this customer?');
            return response;
        }

        
        </script>
        <script src=filternames.js></script>
        <p>
        <input type="text" id="searchbox">
        <a id="searchbutton" class="button" onclick="filterNamesBySearch()"> Filter Names </a>
    </p>

        <form name="myForm" action="delete.php" onsubmit="return confirmCheck()" method="POST">
        <p>
            <label for="amendid">Person Id</label>
            <input type="text" name="amendid" id="amendid" readonly>
        </p>
        <p>
            <label for="amendsurname">Sur Name</label>
            <input type="text" name="amendsurname" id="amendsurname" readonly>
        </p>
        <p>
            <label for="amendname">Name</label>
            <input type="text" name="amendname" id="amendname" readonly>
        </p>
        <p>
            <label for="amendaddress">Address</label>
            <input type="text" name="amendaddress" id="amendaddress" readonly>
        </p>
        <p>
            <label for="amendeircode">Eircode</label>
            <input type="text" name="amendeircode" id="amendeircode" readonly>
        </p>
        <p>
            <label for="amendphone_no">Phone Number</label>
            <input type="text" name="amendphone_no" id="amendphone_no" readonly>
        </p>
        <p>
            <label for="amendcredit_limit">Credit Limit</label>
            <input type="text" name="amendcredit_limit" id="amendcredit_limit" readonly>
        </p>
        <p>
            <label for="amendmoney_balance">Money Balance</label>
            <input type="text" name="amendmoney_balance" id="amendmoney_balance" readonly>
        </p>

            <br><br>

            <input type="submit" value="Delete" class=button>
            <a class=button href="./customer_menu.html">Back to Menu</a>
    </form>
    </div>

    </body>

    </html>