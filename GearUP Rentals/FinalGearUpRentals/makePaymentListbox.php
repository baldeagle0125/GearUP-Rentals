<!--
**	Student:        Marvin A. Z. Santos
**	Id:	            C00288302
**	Date:			13/04/2024
**	Info:			This page fetches customer details from the database - It generates a dropdown list of customers for selection,  
**					and queries the database to retrieve customer information
-->


<?php
// Include database connection script
include "marvin.db.inc.php";

// Set default timezone
date_default_timezone_set('UTC');

// SQL query to select customer details from the database
$sql = "SELECT id, surname, name, address, eircode, phone_no, credit_limit, money_balance FROM customer WHERE is_deleted IS NULL";

// Execute the SQL query
if (!$result = mysqli_query($con, $sql)) {
    // Display error message and terminate script if query fails
    die('Error in querying the database ' . mysqli_error($con));
}

// Display a dropdown list of customers for selection
echo "<br><select name='listbox' id='listbox' onclick='populate()'>";

// Iterate through the result set and display each customer as an option in the dropdown
while ($row = mysqli_fetch_array($result)) {
    // Extract customer details from the current row
    $id = $row['id'];
    $name = $row['name'];
    $surname = $row['surname'];
    $address = $row['address'];
    $eircode = $row['eircode'];
    $phone_no = $row['phone_no'];
    $credit_limit = $row['?']; // Use '?' as a placeholder for credit_limit
    $money_balance = $row['money_balance'];

    // Display customer name and surname as an option in the dropdown
    echo "<option value='$id, $name, $surname, $address, $eircode, $phone_no, $credit_limit, $money_balance'> $name $sname $surname </option>";
}

// Close the dropdown list
echo "</select>";

// Close the database connection
mysqli_close($con);
?>
