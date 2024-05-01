<!--
**    Student:        Marvin A. Z. Santos
**    Id:             C00288302
**    Info:           This page sends the information added to the Add New Supplier Form to the database and displays the confirmation.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="mainStyle.css">
</head>
<body>
    <!-- Include Header -->
    <?php include 'navigationMenu.php'; ?>

    <!-- Main Content Area -->
    <div class="main-content">
        
        <!-- LEFT Content - Submenu -->
        <aside class="left-content">
            <!-- Include Submenu -->
            <?php include 'supplierSubmenu.html.php'; ?>
        </aside>
        
        <!-- RIGHT Content - Form -->
        <section class="right-content">
            <?php //INSERT new record to the Database

            include 'marvin.db.inc.php'; //Includes the external PHP database file
            date_default_timezone_set("UTC"); //Sets the default timezone to UTC
        
            // Set the variables to the values submitted in the supplier submitted form 
            $supplierName = isset($_POST['supplierTradingName']) ? $_POST['supplierTradingName'] : '';
            $supplierAddress = isset($_POST['supplierAddress']) ? $_POST['supplierAddress'] : '';
            $supplierEircode = isset($_POST['supplierEircode']) ? $_POST['supplierEircode'] : '';
            $supplierPhone = isset($_POST['supplierPhone']) ? $_POST['supplierPhone'] : '';
            $supplierEmail = isset($_POST['supplierEmail']) ? $_POST['supplierEmail'] : '';
            $supplierWebsite = isset($_POST['supplierWebsite']) ? $_POST['supplierWebsite'] : '';
            $isDeleted = 0; 

            // Finds the largest id value in the supplier table
            $id_sql = "SELECT MAX(supplier.id) FROM supplier";    

            // Checks if the SQL query executes properly | IF not it terminates with an error message
            if (!($result = mysqli_query($con, $id_sql)))
            {
                die ("An error in SQL Query: " . mysqli_error($con));
            }

            // Assigns the value of the max id from the supplier table plus 1 to have a unique id number
            $new_id = (mysqli_fetch_array($result) [0]) + 1;

            // Inserts the data entered into the supplier add form page 
            // SQL query to insert data into the supplier database table
            $sql = "INSERT INTO supplier (id, trading_name, address, eircode, phoneno, email, website, is_deleted) VALUES ($new_id, '$supplierName', '$supplierAddress', '$supplierEircode', '$supplierPhone', '$supplierEmail', '$supplierWebsite','$isDeleted')";
        
            // Checks if the SQL query executes properly | IF not it terminates with an error message
            if (!mysqli_query($con, $sql))
            {
                die ('An error in SQL Query: ' . mysqli_error($con));
            }

            // Outputs the confirmation if the new data is successfully added
            echo "<br><br><br><h3><span style='font-size:30px;'>&#10004; </span> The Supplier &quot<i>".$_POST['supplierTradingName']."</i>&quot has been added successfully.</h3>";

            //Closes the database connection
            mysqli_close($con);
        ?> 
        
        <!--Submit button to return to Supplier Menu Page -->
        <form action="supplierAddHome.html.php">
            <br>
            <input type="submit" value="Return to Add Page">    
        </form>
            
        </section>
        
   </div>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>

</body>
</html>
