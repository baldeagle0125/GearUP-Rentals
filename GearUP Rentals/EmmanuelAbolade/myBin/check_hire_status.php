<?php
// check_hire_status.php - PHP script to check if an equipment type has items currently on hire- a needed query from deleteETscript.js

// Include database connection
include 'db.inc.php';

// Get equipment type ID from query parameter on equipment-item table
$type_id = $_GET['id'];

// Check if any equipment items of the specified type are currently on hire
$sql = "SELECT COUNT(*) AS count FROM hire WHERE item_id IN (SELECT id FROM equipment_item WHERE type_id = '$type_id')";
$result = $con->query($sql);

// Check if query was successful
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $on_hire = $row['count'] > 0 ? true : false;
    // Send response as JSON
    echo json_encode(array('is_hired' => $on_hire));
} else {
    // Error handling
    echo json_encode(array('is_hired' => false)); // Assume no items on hire in case of error
}

// Close database connection
$con->close();
?>
