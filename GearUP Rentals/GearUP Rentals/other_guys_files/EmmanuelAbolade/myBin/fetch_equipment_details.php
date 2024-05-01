<?php
//php referenced from deleteET.html
// Establishing a database connection
include 'db.inc.php';

// Check if equipment type ID is provided in the URL
if (isset($_GET['equipmentType']) && !empty($_GET['equipmentType'])) {
    // check the input to prevent SQL injection
    $equipmentTypeId = mysqli_real_escape_string($con, $_GET['equipmentType']);

    // Query to fetch equipment details from the database based on equipment type ID
    $sql = "SELECT * FROM equipment_type WHERE id = '$equipmentTypeId'"; // Adjust table name if necessary

    // Perform the query
    $result = mysqli_query($con, $sql);

    // Check if equipment details are found
    if (mysqli_num_rows($result) > 0) {
        // Fetch equipment details
        $equipmentDetails = mysqli_fetch_assoc($result);

        // Output equipment details as JSON
        echo json_encode($equipmentDetails);
    } else {
        // No equipment details found for the provided ID
        echo json_encode(array('error' => 'Equipment details not found'));
    }
} else {
    // Equipment type ID not provided in the URL
    echo json_encode(array('error' => 'Equipment type ID not provided'));
}

// Close the connection
mysqli_close($con);
?>
