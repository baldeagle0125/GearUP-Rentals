<?php
// fetch_all_equipment_types.php - PHP script to fetch all equipment types from the database for amendviewET.html

// Include database connection
include 'db.inc.php';

// Fetch all equipment types query
$sql = "SELECT * FROM equipment_type WHERE is_deleted = 0";
$result = $con->query($sql);

// Check if query was successful
if ($result->num_rows > 0) {
    // Initialize array to store equipment types
    $equipmentTypes = array();
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Add equipment type to the list
        $equipmentTypes[] = $row;
    }
    // Send equipment types as JSON response
    echo json_encode($equipmentTypes);
} else {
    // No equipment types found
    echo json_encode(array());
}

// Close database connection
$con->close();
?>
