<!--include menu.php, database and set the default for time-->
	<?php 	include "menu.php";
	  		include 'db.inc.php';
	  		date_default_timezone_set('UTC');
	?>
<!DOCTYPE html>
<!--
Name: Emmanuel Abolade
Student number: c00288657
Date: 12/02/2024
Project: c2p-equiphire
--> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing Hire</title>
	<link rel ="stylesheet" href="../ETCommonmenu/menu.css"/> <!--link to external style sheet called ET.css-->
    
</head>
<body>
    <!-- Container for the content -->
    <div class="container">
        <!-- PHP code to execute and display form -->
        
<?php
//This php is processed from script.js
// Include database connection
include 'db.inc.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $staffId = $_POST['staff'];
    $customerId = $_POST['customer'];
    $equipmentType = $_POST['equipment_type'];
    $numDays = $_POST['num_days'];
    $payment = isset($_POST['payment']) ? true : false; // Check if payment is selected

    // Perform additional validation if necessary

    // Calculate due date based on the current date and number of days
    $dueDate = date('Y-m-d', strtotime('+' . $numDays . ' days'));

    // Update database records
    try {
        // Begin transaction
        $pdo->beginTransaction();

        // Insert new hire record
        $stmt = $pdo->prepare("INSERT INTO hire (staff_id, customer_id, equipment_type, num_days, due_date) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$staffId, $customerId, $equipmentType, $numDays, $dueDate]);
        $hireId = $pdo->lastInsertId(); // Get the auto-generated hire ID

        // Update equipment item status to hired
        // Example query: UPDATE equipment_item SET status = 1 WHERE type_id = ?
        // You need to replace the placeholders with actual values and execute the query

        // Handle payment processing if selected
        if ($payment) {
            // Process payment logic goes here
            // Example: Update customer's account balance, insert payment record, etc.
        }

        // Commit transaction
        $pdo->commit();

        // Redirect to appropriate page
        header("Location: success_page.php");
        exit();
    } catch (Exception $e) {
        // Rollback transaction on error
        $pdo->rollback();
        // Handle error (e.g., display error message, log error, redirect to error page)
        echo "An error occurred: " . $e->getMessage();
    }
} else {
    // Redirect to appropriate page if form is not submitted
    header("Location: hire_equipment.php");
    exit();
}
?>
