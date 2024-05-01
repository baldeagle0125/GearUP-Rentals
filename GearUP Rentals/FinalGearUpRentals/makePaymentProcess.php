<!--
**	Student:        Marvin A. Z. Santos
**	Id:	            C00288302
**	Date:			13/04/2024
**	Info:			This page Process the information/Payment Amount added to the customer and customer_payment tables
**					and confirmation of success or errors while processing
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="makePaymentStlyle.css">
</head>
<body>
    <!-- Include Header -->
    <?php include 'navigationMenu.php'; ?>

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- RIGHT Content - Form -->
        <section class="right-content">
            <?php
            // Include database connection script
            include 'marvin.db.inc.php';

            // Set default timezone
            date_default_timezone_set('UTC');

            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve and sanitize form data
                $amendcredit_limit = isset($_POST['amendcredit_limit']) ? mysqli_real_escape_string($con, $_POST['amendcredit_limit']) : '';
                $amendid = isset($_POST['amendid']) ? mysqli_real_escape_string($con, $_POST['amendid']) : '';
                $payment_date = date('Y-m-d'); // Current date
                $payment_type = isset($_POST['payment_type']) ? mysqli_real_escape_string($con, $_POST['payment_type']) : '';
                $details = isset($_POST['details']) ? mysqli_real_escape_string($con, $_POST['details']) : ''; // Optional details field

                // Check if the entered amount is greater than 0
                if ($amendcredit_limit <= 0) {
                    echo "Payment amount must be greater than 0.";
                    exit; // Stop further processing
                }

                // Generate the primary key for the new transaction
                $id_sql = "SELECT MAX(id) FROM customer_payment";
                $result = mysqli_query($con, $id_sql);
                $new_id = 0;
                if ($result) {
                    $row = mysqli_fetch_array($result);
                    $new_id = $row[0] + 1;
                } else {
                    die(mysqli_error($con));
                }

                /* Output form data for debugging ** Hide/comment when not debugging
					echo "amendcredit_limit: $amendcredit_limit <br>";
					echo "amendid: $amendid <br>";
					echo "payment_date: $payment_date <br>";
					echo "payment_type: $payment_type <br>";
					echo "details: $details <br>";
					echo "new_id: $new_id <br>";
				*/

                // Ensure required fields are not empty
                if (!empty($amendcredit_limit) && !empty($amendid) && !empty($payment_date) && !empty($payment_type)) 
				{
                    // Update customer balance in the database
                    $sql_update = "UPDATE customer SET money_balance = money_balance - $amendcredit_limit WHERE id = $amendid";

                    if (mysqli_query($con, $sql_update)) {
                        // Insert transaction into customer_payment table
                        $sql_insert = "INSERT INTO customer_payment (id, customer_id, payment_date, details, payment_type) 
                                       VALUES ('$new_id', '$amendid', '$payment_date', '$details', '$payment_type')";

                        if (mysqli_query($con, $sql_insert)) {
							
							// Outputs the confirmation if the new data is successfully added
							echo "<br><br><br><h3><span style='font-size:30px;'>&#10004;</span><i> The Customer &quot;".$_POST['amendname']." ".$_POST['amendsurname']."&quot; Payment has been made successfully.</i></h3>";


                        } 
						else 
						{
                            echo "Error inserting transaction: " . mysqli_error($con);
                        }
                    } 
					else 
					{
                        echo "Error updating customer balance: " . mysqli_error($con);
                    }
                } 
				else 
				{
                    echo "One or more required fields are empty.";
                }
            }

            // Close database connection
            mysqli_close($con);
            ?>

            <!--Submit button to return to Payment Page -->
            <form action="makePayment.html.php" method="POST"><br>
                <input type="submit" value="Return to previous page">
            </form>
        </section>
    </div>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>

</body>
</html>
