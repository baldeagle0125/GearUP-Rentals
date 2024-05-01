
<?php
// query needed by deleteETscript.js
// Establish a database connection
include 'db.inc.php';

// Query to fetch equipment types from the database
$sql = "SELECT id, description FROM equipment_type"; // query for id and description on equipment_type table

// Perform the query
$result = mysqli_query($con, $sql);

// Check if there are any equipment types
if (mysqli_num_rows($result) > 0) {
    // Array to store equipment types
    $equipmentTypes = array();

    // Fetch each row and store it in the array
    while ($row = mysqli_fetch_assoc($result)) {
        $equipmentTypes[] = $row;
    }

    // Output the equipment types as JSON
    echo json_encode($equipmentTypes);
} else {
    // No equipment types found
    echo json_encode(array('message' => 'No equipment types found'));
}

// Close the connection
mysqli_close($con);
?>
