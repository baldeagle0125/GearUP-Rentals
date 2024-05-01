<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="content">
<?php
//AUTHOR: IHOR ANTONOV
//STUDENT ID: C00291296
//DATE: 11/04/2024
include 'db.inc.php';

date_default_timezone_set('UTC');

$sql = "UPDATE customer SET is_deleted = 1 WHERE id = '$_POST[amendid]'";

        if(!mysqli_query($con, $sql))
        {
            echo "Error ".mysqli_error($con);
        }
        else
        {
            if(mysqli_affected_rows($con) != 0)
            {
                echo mysqli_affected_rows($con) . " record(s) updated <br>"; //VERY NICE
                echo "Person Id " . $_POST['amendid'] . ", $_POST[amendname] $_POST[amendsurname], deleted <br>"; //GREAT SUCCESS
            }
            else
            {
                echo "No records were changed"; //very sorry
            }
        }
        mysqli_close($con);
?>

<form action="delete.html.php" method = "post">
    <input type = "submit" value = "Return to Previous Screen">
</form>
    </div>
    </body>
    </html>