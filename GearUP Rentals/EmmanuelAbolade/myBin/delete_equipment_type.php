<?php
// delete_equipment_type.php - PHP script to mark an equipment type as 'deleted'

// Include database connection
include 'db.inc.php';

// Get equipment type ID from form data
$type_id = $_POST['equipmentType'];

// Mark equipment type as 'deleted'
$sql = "UPDATE equipment_type SET is_deleted = 1 WHERE id = '$type_id'";

// Execute query
if ($con->query($sql) === TRUE) {
    echo "Equipment type deleted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

// Close database connection
$con->close();
?>
