<!--
	File name: equipment_item_maintenance_menu.php
	File purpose: Displays "Equipment Item Maintenance Menu" page
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
        <title>GearUP Rentals | Equipment Item Maintenance Menu</title>
        <!-- Include CSS file for styling -->
        <link rel="stylesheet" href="equipment_item_maintenance_menu.css">
    </head>
    <body>
        <div class="content">
            <h1>Equipment Item Maintenance Menu</h1>
            <div class="button-container">
                <!-- Form to capture button clicks -->
                <form action="#" method="post">
                    <!-- Button to add an equipment item -->
                    <button type="submit" name="add_item">Add an Equipment Item</button>
                    <!-- Button to delete an equipment item -->
                    <button type="submit" name="delete_item">Delete an Equipment Item</button>
                    <!-- Button to amend or view an equipment item -->
                    <button type="submit" name="amend_view_item">Amend/View an Equipment Item</button>
                    <!-- Button to return to the file maintenance menu -->
                    <button type="submit" name="return">Return</button>
                </form>
            </div>
        </div>
        <?php
            // Check which button was clicked
			if (isset($_POST['add_item'])) {
				header("Location: add_an_equipment_item/add_an_equipment_item.php");
				exit(); 
			} elseif (isset($_POST['delete_item'])) {
				header("Location: delete_an_equipment_item/delete_an_equipment_item.php");
				exit(); 
			} elseif (isset($_POST['amend_view_item'])) {
				header("Location: amend_or_view_an_equipment_item/amend_or_view_an_equipment_item.php");
				exit();
			} elseif (isset($_POST['return'])) {
				header("Location: ../file_maintenance_menu.html");
				exit();
			}
		?>
    </body>
</html>
