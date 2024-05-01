<!--====================================================================
	Name: 				Emmanuel Abolade
	Student number:		C00288657
	Date: 				08/03/2024
	Project:			c2p-equiphire
	Task: 				menu.php <title>Navigation Menu</title>
	Purpose:			To include menu to all web pages
====================================================================-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Navigation Menu</title>
	<link rel="stylesheet" type="text/css" href="menu.css"> <!-- Link to external CSS file -->
</head>
<body>
	<header>
    <!-- Logo image -->
    <img src="GearUpLogo.png" alt="Gear Up Hire Equipment Logo">
	</header>

	<div class = "menu">
	<!-- naviagtion menu -->
	<nav>
		<ul>
			<!-- Link to Hiring of equipment -->
			<li><a href="EThire_equipmenthtml.php" class="dropbtn">Hiring of Equipment</a></li>
			<!-- Link to Return of equipment -->
			<li><a href="ReturnOfEquipment.html.php" class="dropbtn">Return of Equipment</a></li>
			<!-- Link to Make a Payment -->
			<li><a href="makePayment.html.php" class="dropbtn">Make a Payment</a></li>
			<!-- Link to Stock Control Menu -->
			<li><a href="#" class="dropbtn">Stock Control Menu</a></li>
			<!-- Drop down List for File Maintenence Menu -->
			<li class="dropdown"><a href="#" class="dropbtn">File Maintenance Menu</a>
				<!-- Wrapper for dropdown content -->
        		<div class="dropdown-content">
					<!-- Link to Equipment Type Maintenance Menu -->
          			<a href="ETmenumaintenance.php">Equipment Type Maintenance Menu</a>
					<!-- Link to Equipment Item Maintenance Menu -->
          			<a href="#">Equipment Item Maintenance Menu</a>
					<!-- Link to Customer Maintenance Menu -->
          			<a href="customer_menu.html">Customer Maintenance Menu</a>
					<!-- Link to Supplier Maintenance Menu -->
          			<a href="supplierSubmenu.html.php">Supplier Maintenance Menu</a>
					<!-- Link to Staff Maintenance Menu -->
          			<a href="#">Staff Maintenance Menu</a>
        		</div>
      		</li>
			<!-- Link to Reports Menu -->
      		<li><a href="#" class="dropbtn">Reports Menu</a></li>
			<!-- Link to Quit -->
      		<li><a href="#" class="dropbtn">Quit</a></li>
    	</ul>
  	</nav>
	</div>

</body>
</html>
