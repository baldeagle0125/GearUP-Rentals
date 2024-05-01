<?php
include 'db.inc.php';

// Check if equipment type is selected
if(isset($_POST['equipment_type'])) {
    $equipment_type_id = $_POST['equipment_type'];

    // Check if there are any equipment items of this type on hire
    $sql_check_hire = "SELECT COUNT(*) as count FROM hire JOIN equipment_item ON hire.item_id = equipment_item.id WHERE equipment_item.type_id = $equipment_type_id";
    $result_check_hire = $con->query($sql_check_hire);

    if ($result_check_hire->num_rows > 0) {
        $row = $result_check_hire->fetch_assoc();
        $count = $row['count'];

        if($count > 0) {
            echo "Cannot delete this equipment type as there are $count equipment items on hire.";
        } else {
            // Prompt for confirmation
            echo "<script>
                    var confirmation = confirm('Are you sure you want to delete this equipment type?');
                    if (confirmation) {
                        window.location.href = 'delete_confirm.php?equipment_type_id=$equipment_type_id';
                    } else {
                        window.location.href = 'delete_equipment_type.php';
                    }
                </script>";
        }
    } else {
        echo "Error in checking equipment items on hire.";
    }
} else {
    echo "Equipment type not selected.";
}
?>
