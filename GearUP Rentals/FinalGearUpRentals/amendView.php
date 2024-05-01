<?php
//AUTHOR: IHOR ANTONOV
//STUDENT ID: C00291296
//DATE: 11/04/2024
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="content">
<?php
include 'db.inc.php';

date_default_timezone_set('UTC');

$sql = "UPDATE customer SET name = '$_POST[amendname]',
        surname = '$_POST[amendsurname]',
        address = '$_POST[amendaddress]',
        eircode = '$_POST[amendeircode]',
        phone_no = '$_POST[amendphone_no]',
        credit_limit = '$_POST[amendcredit_limit]',
        money_balance = '$_POST[amendmoney_balance]'
        WHERE id = $_POST[amendid]";

        if(!mysqli_query($con, $sql))
        {
            echo "Error ".mysqli_error($con);
        }
        else
        {
            if(mysqli_affected_rows($con) != 0)
            {
                echo mysqli_affected_rows($con) . " record(s) updated <br>";
                echo "Person Id " . $_POST['amendid'] . ", " . $_POST['amendname']
                . " " . $_POST['amendsurname'] . " has been updated";
            }
            else
            {
                echo "No records were changed";
            }
        }
        mysqli_close($con);
?>

<form action="amendView.html.php" method = "post">
    <input type = "submit" value = "Return to Previous Screen">
</form>
    </div>
    </body>
    </html>