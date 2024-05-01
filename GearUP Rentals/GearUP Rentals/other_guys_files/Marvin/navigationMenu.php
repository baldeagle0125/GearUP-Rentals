<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Navigation Menu</title>
  
<style>
  /* Resetting default margin and padding */
  body, h1, h2, p, ul, li {
    margin: 0;
    padding: 0;
  }
  
  body {
    font-family: Arial, sans-serif;
    background-color: #F9F9F9; /* Light gray background */
    color: #333333; /* Dark gray text color */
    line-height: 1.6;
  }

  /* Header Styles */
  header {
    background-color: #005792; /* Dark blue header background */
    color: #FFFFFF; /* White header text color */
    text-align: center;
    height: auto; /* Adjust height automatically */
  }

  header img {
    width: 200px; /* Adjust the width as needed */
    height: auto; /* Adjust height automatically */
  }

  /* Menu Styles */
  nav {
    background-color: #f7ba05; /* Yellow menu background for contrast*/
    text-align: center;
    padding: 10px 0; /* Increased padding for better separation */
  }

  nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
  }

  nav ul li {
    display: inline;
    margin: 0 10px; /* Increased margin for better spacing */
  }

  .dropbtn {
    background-color: #f7ba05; /* Yellow menu background */
    color: #005792; /* Dark blue header background color */
    font-weight: bold; /* Make text bold */
    padding: 15px 20px; /* Added padding */
    border: none;
    border-radius: 5px; /* Rounded corners for menu items */
    cursor: pointer;
    transition: background-color 0.3s ease; /* Smooth transition on hover */
    text-decoration: none; /* Remove underline */
    display: inline-block; /* Prevents the button from taking full width */
  }

  .dropbtn:hover, .dropdown:hover .dropbtn {
    background-color: #005792; /* Dark blue header background color */
    color: #FFFFFF; /* White text color on hover */
  }

  /* Dropdown Styles */
  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #005792; /* Dark blue header background color */
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    border-radius: 5px; /* Rounded corners */
  }

  .dropdown-content a {
    color: #FFFFFF; /* White text color */
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-weight: bold; /* Make text bold */
    border-radius: 5px; /* Rounded corners for menu items */
    transition: background-color 0.3s ease; /* Smooth transition on hover */
  }

  .dropdown-content a:hover {
    background-color: #f7ba05; /* Yellow menu background */
    color: #005792; /* Dark blue text color on hover */
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

</style>
</head>
<body>
  <header>
    <!-- Logo image -->
    <img src="https://c2p-equiphire.candept.com/Marvin/images/GearUpLogo.png" alt="Gear Up Hire Equipment Logo">
  </header>

  <nav>
    <ul>
      <li><a href="#" class="dropbtn">Hiring of Equipment</a></li>
      <li><a href="#" class="dropbtn">Return of Equipment</a></li>
      <li><a href="#" class="dropbtn">Make a Payment</a></li>
      <li><a href="#" class="dropbtn">Stock Control Menu</a></li>
      <li class="dropdown">
        <a href="#" class="dropbtn">File Maintenance Menu</a>
        <div class="dropdown-content">
          <a href="#">Equipment Type Maintenance Menu</a>
          <a href="#">Equipment Item Maintenance Menu</a>
          <a href="#">Customer Maintenance Menu</a>
          <a href="./supplierAddHome.html.php">Supplier Maintenance Menu</a>
          <a href="#">Staff Maintenance Menu</a>
        </div>
      </li>
      <li><a href="#" class="dropbtn">Reports Menu</a></li>
      <li><a href="#" class="dropbtn">Quit</a></li>
    </ul>
  </nav>

</body>
</html>
