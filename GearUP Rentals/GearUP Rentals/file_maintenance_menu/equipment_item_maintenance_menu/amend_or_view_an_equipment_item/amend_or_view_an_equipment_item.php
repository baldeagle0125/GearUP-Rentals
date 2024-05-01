<!--
	File name: amend_or_view_an_equipment_item.php
	File purpose: Displays "Amend or View an Equipment Item" page
	Student ID: C00290950
	Student name: Ihor Melashchenko
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set document character encoding to UTF-8 -->
    <meta charset="UTF-8">
    <!-- Configure viewport for responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Set page title -->
    <title>GearUP Rentals | Amend or View an Equipment Item</title>
    <!-- Include CSS file for styling -->
    <link rel="stylesheet" href="amend_or_view_an_equipment_item.css">
    <!-- JavaScript functions for form confirmation and clearing -->
</head>
<body>
    <div class="content">
        <h1>Amend or View an Equipment Item</h1>
        <!-- Form for selecting and displaying equipment item details -->
        <form action="" method="post">
            <!-- Select equipment item -->
            <label for="equipment_item_id">Select Equipment Item:</label><br>
            <select id="equipment_item_id" name="equipment_item_id">
                <!-- Populate with equipment item IDs from the database -->
                <?php
                // Include database connection file
                include('db_connection.php');

                // SQL query to retrieve equipment item IDs
                $sql = "SELECT id FROM equipment_item";

                // Execute query
                $result = mysqli_query($conn, $sql);

                // Check if query returned any rows
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row and generate options for select dropdown
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['id'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No equipment items found</option>";
                }
                ?>
            </select><br>

            <!-- Display equipment item details -->
            <!-- Equipment Item ID -->
            <label for="display_equipment_item_id">Equipment Item ID:</label><br>
            <input type="text" id="display_equipment_item_id" name="display_equipment_item_id" readonly><br>
            <!-- Equipment Type ID -->
            <label for="display_equipment_type_id">Equipment Type ID:</label><br>
            <input type="text" id="display_equipment_type_id" name="display_equipment_type_id" readonly><br>
            <!-- Description -->
            <label for="display_description">Description:</label><br>
            <input type="text" id="display_description" name="display_description" readonly><br>
            <!-- Date of Purchase -->
            <label for="display_date_of_purchase">Date of Purchase:</label><br>
            <input type="date" id="display_date_of_purchase" name="display_date_of_purchase" readonly><br>
            <!-- Cost Price -->
            <label for="display_cost_price">Cost Price:</label><br>
            <input type="number" id="display_cost_price" name="display_cost_price" readonly><br>
            <!-- Condition -->
            <label for="display_condition">Condition:</label><br>
            <input type="text" id="display_condition" name="display_condition" readonly><br>
            <!-- Status -->
            <label for="display_status">Status:</label><br>
            <input type="text" id="display_status" name="display_status" readonly><br>

            <!-- Navigation buttons -->
            <button type="button" id="first_button">First</button>
            <button type="button" id="previous_button">Previous</button>
            <button type="button" id="next_button">Next</button>
            <button type="button" id="last_button">Last</button><br>

            <!-- Amend button -->
            <button type="button" id="amend_button">Amend</button>

            <!-- Confirmation for changes -->
            <div id="confirmation" style="display: none;">
                <p>Do you want to keep these changes?</p>
                <button type="button" id="confirm_yes_button">Yes</button>
                <button type="button" id="confirm_no_button">No</button>
            </div>
        </form>
    </div>

    <!-- Include JavaScript file for dynamic functionality -->
    <script src="amend_or_view_equipment_item.js"></script>
</body>
</html>
