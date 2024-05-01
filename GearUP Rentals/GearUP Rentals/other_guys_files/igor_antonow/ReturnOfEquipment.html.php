<?PHP
//AUTHOR: IHOR ANTONOV
//STUDENT ID: C00291296
//DATE: 11/04/2024
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="content">
        <h1> Delete a Customer</h1>
        <strong> Please select a person and then click the Delete button if you wish to delete </strong>
        <form name=customer method="POST" action="ReturnOfEquipment.html.php">
    <?php include 'hireselect_listbox.php'; ?>
    <script>
        </script>
        <script src=filternames.js></script>
        <p>
        <input type="text" id="searchbox">
        <a id="searchbutton" class="button" onclick="filterNamesBySearch()"> Filter Names </a>
    </p>
    <input type="submit" value="View Hires" class="button">
</form>
<?php
    if(isset($_POST['listbox'])) {
        include 'HireTable.php';
    }

    if(isset($_POST['hire'])) { //if the user selected a hire to return
        include 'return_hire.php';
    }
?>
        
    </div>

    </body>

    </html>