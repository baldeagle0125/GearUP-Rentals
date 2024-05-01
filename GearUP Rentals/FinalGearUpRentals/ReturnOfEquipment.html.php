<?PHP
//AUTHOR: IHOR ANTONOV
//STUDENT ID: C00291296
//DATE: 11/04/2024
?>
<?php include 'menu.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="menu.css">
    </head>
    <body>
        <div class="container">
        <h1> Return an Equipment</h1>
        <strong> Please select a customer and then click the View hire button to return and equipment </strong>
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
        
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php 	include "footer.php";
	?>
    </body>

    </html>