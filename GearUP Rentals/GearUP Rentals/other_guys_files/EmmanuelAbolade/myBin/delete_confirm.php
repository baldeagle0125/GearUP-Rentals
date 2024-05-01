<?php

include 'db.inc.php';

// Check if equipment type ID is provided
if(isset($_GET['equipment_type_id'])) {
    $equipment_type_id = $_GET['equipment_type_id'];

    // Perform deletion
    $sql_delete = "UPDATE equipment_type SET is_deleted = 1 WHERE id = $equipment_type_id";
    if ($con->query($sql_delete) === TRUE) {
        echo "Equipment type deleted successfully.";
    } else {
        echo "Error deleting equipment type: " . $con->error;
    }
} else {
    echo "Equipment type ID not provided.";
}
?>
