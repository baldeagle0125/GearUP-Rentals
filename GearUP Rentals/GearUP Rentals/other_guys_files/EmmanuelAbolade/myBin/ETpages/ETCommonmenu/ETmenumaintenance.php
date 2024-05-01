<!--include menu.php, database and set the default for time-->
	<?php 	include "menu.php";
	  		
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
<title>Equipment Type Maintenance Menu</title>
<link rel="stylesheet" href="menu.css"> <!-- Link to CSS file -->
</head>
<body class = "ETmenu">
	<br><br>
	<!--div class="content"-->
  <h1>Equipment Type Maintenance Menu</h1><br><br><br><br>
  <ul class="ETmenuUL">
    <li><a href="../ETaddpages/ETaddhtml.php" class="a">Add an Equipment Type</a></li><br><!--link leads to ETaddhtml.php-->
    <li><a href="../ETdeletepages/ETDeleteFullyhtml.php" class="a">Delete an Equipment Type</a></li><br><!--link leads to deleteET.php-->
    <li><a href="../ETamendviewpages/ETamendviewhtml.php" class="a">Amend/View an Equipment Type</a></li><!--link leads to amendviewET.php-->
    
  </ul>
<!--/div-->
	
</body>
</html>
