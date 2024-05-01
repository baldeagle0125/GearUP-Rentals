<?php
/*
	File name: delete_an_equipment_item.php
	File purpose: Displays "Delete an Equipment Item" page
	Student ID: C00290950
	Student name: Ihor Melashchenko
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set document character encoding to UTF-8 -->
    <meta charset="UTF-8">
    <!-- Configure viewport for responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Set page title -->
    <title>GearUP Rentals | Delete an Equipment Item</title>
    <!-- Include CSS file for styling -->
    <link rel="stylesheet" href="delete_an_equipment_item.css">
</head>
<body>
    <div class="content">
        <h1>Delete an Equipment Item</h1>
        <!-- Form for selecting and deleting an equipment item -->
        <form action="" method="post">
            <label for="equipment_type_id">Search by Equipment Type ID:</label><br>
            <input type="text" id="equipment_type_id" name="equipment_type_id"><br>
            <label for="equipment_item_id">Search by Equipment Item ID:</label><br>
            <input type="text" id="equipment_item_id" name="equipment_item_id"><br>
            <button type="submit" name="find">Find</button>
        </form>
        <?php
        // Include database connection file
        include('db_connection.php');

        // Check if form is submitted
        if (isset($_POST['find'])) {
            $equipment_type_id = $_POST['equipment_type_id'];
            $equipment_item_id = $_POST['equipment_item_id'];

            // Check if equipment item exists
            $sql_find_item = "SELECT ei.id AS item_id, et.id AS type_id, et.description AS type_description, ei.date_bought, ei.price, ei.is_hired
                              FROM equipment_item AS ei
                              INNER JOIN equipment_type AS et ON ei.type_id = et.id
                              WHERE ei.id = '$equipment_item_id' OR et.id = '$equipment_type_id'";
            $result_find_item = mysqli_query($conn, $sql_find_item);

            if (mysqli_num_rows($result_find_item) > 0) {
                // Display equipment item details
                while ($row_item = mysqli_fetch_assoc($result_find_item)) {
                    echo "<p>Equipment Item ID: " . $row_item['item_id'] . "</p>";
                    echo "<p>Equipment Type ID: " . $row_item['type_id'] . "</p>";
                    echo "<p>Description: " . $row_item['type_description'] . "</p>";
                    echo "<p>Date of Purchase: " . $row_item['date_bought'] . "</p>";
                    echo "<p>Cost Price: " . $row_item['price'] . "</p>";

                    // Check if the item is on hire
                    if ($row_item['is_hired'] == 1) {
                        echo "<p>Status: On Hire</p>";
                        echo "<p>Cannot delete this item as it is currently on hire.</p>";
                    } else {
                        // Allow deletion
                        echo "<form action='' method='post'>";
                        echo "<input type='hidden' name='delete_item_id' value='" . $row_item['item_id'] . "'>";
                        echo "<button type='submit' name='delete'>Delete</button>";
                        echo "</form>";
                    }
                }
            } else {
                echo "<p>No equipment item found.</p>";
            }
        }

        // Check if delete request is submitted
        if (isset($_POST['delete'])) {
            $delete_item_id = $_POST['delete_item_id'];

            // Check if item is not on hire
            $sql_check_hire = "SELECT is_hired FROM equipment_item WHERE id = '$delete_item_id'";
            $result_check_hire = mysqli_query($conn, $sql_check_hire);
            $row_check_hire = mysqli_fetch_assoc($result_check_hire);

            if ($row_check_hire['is_hired'] == 0) {
                // Mark the item as deleted
                $sql_delete_item = "UPDATE equipment_item SET is_deleted = 1 WHERE id = '$delete_item_id'";
                if (mysqli_query($conn, $sql_delete_item)) {
                    echo "<p>Equipment item deleted successfully!</p>";
                } else {
                    echo "Error: " . $sql_delete_item . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "<p>Cannot delete this item as it is currently on hire.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
