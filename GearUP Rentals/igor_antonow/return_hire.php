<?php
//AUTHOR: IHOR ANTONOV
//STUDENT ID: C00291296
//DATE: 11/04/2024
include 'db.inc.php';

$hire_id = $_POST['hire'];
//delete hire
$sql1 = "UPDATE hire SET is_deleted = 1
        WHERE id = $hire_id";
        //set hired item as available
$sql2 = "UPDATE equipment_item, hire SET is_hired = 0
         WHERE equipment_item.id = hire.item_id AND hire.id = $hire_id";
        //decrease items on hire and increase items available in item type table
$sql3 = "UPDATE equipment_type, equipment_item, hire SET no_available = no_available+1, no_on_hire = no_on_hire - 1
        WHERE equipment_type.id = equipment_item.type_id AND equipment_item.id = hire.item_id";
        //decrease customer money balance
$sql4 = "UPDATE customer, hire SET money_balance = money_balance - number_of_days * cost
         WHERE customer.id = hire.customer_id AND hire.id = " . $hire_id;
        

        if(!mysqli_query($con, $sql1))
        {
            echo "Error ".mysqli_error($con);
        }
        if(!mysqli_query($con, $sql2))
        {
            echo "Error ".mysqli_error($con);
        }
        if(!mysqli_query($con, $sql3))
        {
            echo "Error ".mysqli_error($con);
        }
        if(!mysqli_query($con, $sql4))
        {
            echo "Error ".mysqli_error($con);
        }
        echo "<p> Hire returned successfullly! </p>";
        mysqli_close($con);
?>
    </div>
    </body>