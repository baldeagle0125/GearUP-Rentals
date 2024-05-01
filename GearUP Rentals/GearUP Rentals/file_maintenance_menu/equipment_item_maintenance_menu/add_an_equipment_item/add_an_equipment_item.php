<!--
	File name: add_an_equipment_item.php
	File purpose: Displays "Add an Equipment Item" page
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
    <title>GearUP Rentals | Add an Equipment Item</title>
    <!-- Include CSS file for styling -->
    <link rel="stylesheet" href="add_an_equipment_item.css">
    <!-- JavaScript functions for form confirmation and clearing -->
    <script>
        // Function to display a confirmation prompt before submitting the form
        function confirmAdd() {
            var confirmAdd = confirm("Are you sure you want to add these details?");
            return confirmAdd;
        }

        // Function to clear the input fields of the form
        function clearForm() {
            // Reset the selected index of the dropdown menu to 0
            document.getElementById("equipment_type").selectedIndex = 0;
            // Clear the value of the date input field
            document.getElementById("date_of_purchase").value = "";
            // Clear the value of the cost price input field
            document.getElementById("cost_price").value = "";
        }
    </script>
</head>
<body>
    <div class="content">
        <h1>Add an Equipment Item</h1>
        <!-- Form for adding an equipment item -->
        <form action="" method="post" onsubmit="return confirmAdd()">
            <!-- Input field for selecting equipment type -->
            <label for="equipment_type">Equipment Type:</label><br>
            <select id="equipment_type" name="equipment_type">
                <?php
                // Include database connection file
                include('db_connection.php');

                // SQL query to retrieve equipment types from the database
                $sql = "SELECT id, description FROM equipment_type";

                // Execute query
                $result = mysqli_query($conn, $sql);

                // Check if query returned any rows
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row and generate options for select dropdown
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['description'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No equipment types found</option>";
                }
                ?>
            </select><br>
            <!-- Input field for entering date of purchase -->
            <label for="date_of_purchase">Date of Purchase:</label><br>
            <input type="date" id="date_of_purchase" name="date_of_purchase"><br>
            <!-- Input field for entering cost price -->
            <label for="cost_price">Cost Price:</label><br>
            <input type="number" id="cost_price" name="cost_price"><br>
            <!-- Button to submit the form -->
            <button type="submit" name="submit">Add</button>
            <!-- Button to clear the form -->
            <button type="button" onclick="clearForm()">Clear Form</button>
        </form>

        <?php
        // Check if form is submitted
        if (isset($_POST['submit'])) {
            // Retrieve form data
            $equipment_type = $_POST['equipment_type'];
            $date_of_purchase = $_POST['date_of_purchase'];
            $cost_price = $_POST['cost_price'];

            // Include database connection file
            include('db_connection.php');

            // Autoincrement id
            // Fetch the highest current id and increment it by 1
            $sql_max_id = "SELECT MAX(id) AS max_id FROM equipment_item";
            $result_max_id = mysqli_query($conn, $sql_max_id);
            $row_max_id = mysqli_fetch_assoc($result_max_id);
            $new_id = $row_max_id['max_id'] + 1;

            // Insert the new equipment item into the database
            $sql_insert = "INSERT INTO equipment_item (id, date_bought, price, type_id, is_hired)
                           VALUES ('$new_id', '$date_of_purchase', '$cost_price', '$equipment_type', 0)";

            if (mysqli_query($conn, $sql_insert)) {
                echo "<p>New equipment item added successfully!</p>";
            } else {
                echo "Error: " . $sql_insert . "<br>" . mysqli_error($con);
            }
        }
        ?>
    </div>
</body>
</html>
