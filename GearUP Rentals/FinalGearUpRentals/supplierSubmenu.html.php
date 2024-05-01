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
  <h1>Supplier Maintenance Menu</h1><br><br><br><br>
  	<ul class="ETmenuUL">
    	<li><a href="supplierAddHome.html.php" class="a">Add a Supplier</a></li><br><!--link leads to supplierAddHome.html.php-->
    	<li><a href="supplierDelete.html.php" class="a">Delete a Supplier</a></li><br><!--link leads to supplierDelete.html.php-->
    	<li><a href="supplierAmendView.html.php" class="a">Amend/View a Supplier</a></li><!--link leads to supplierAmendview.html.php-->
    
	</ul>
<!--/div-->
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php 	include "footer.php";
	?>
</body>
	
</html>
