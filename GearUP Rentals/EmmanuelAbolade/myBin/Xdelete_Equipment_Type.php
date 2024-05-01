<?php
// Estabilshing a database connection
include 'db.inc.php';

// Check if equipment type ID is provided
if(isset($_GET['equipmentType']) && !empty($_GET['equipmentType'])) {
    // check the input to prevent SQL injection
    $equipment_type_id = mysqli_real_escape_string($con, $_GET['equipmentType']);
    
    // Check if the equipment type is on hire
    $hire_check_sql = "SELECT * FROM equipment_item WHERE id = '$equipment_type_id' AND is_hired = 0 ";
    $hire_check_result = mysqli_query($con, $hire_check_sql);
    
    if(mysqli_num_rows($hire_check_result) > 0) {
        // Equipment type is on hire, display a message
        echo "Cannot delete equipment type. It is currently in use.";
    } else {
        // Equipment type is not on hire, proceed with deletion
        $delete_sql = "DELETE FROM equipment_type WHERE id = '$equipmentType'";
        
        if(mysqli_query($con, $delete_sql)) {
            echo "Equipment type deleted successfully.";
        } else {
            echo "Error deleting equipment type: " . mysqli_error($con);
        }
    }
} else {
    // Redirect if equipment type ID is not provided
    header("Location: menuETmaintenance.php");
    exit();
}
?>
