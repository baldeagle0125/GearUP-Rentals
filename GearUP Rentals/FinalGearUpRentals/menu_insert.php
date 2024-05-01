<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Equipment Hire Company</title>
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
    display: flex;
    align-items: stretch;
    flex-direction: column;
    justify-content: space-between;
  }

  /* Header Styles */
  header {
    background-color: #005792; /* Dark blue header background */
    color: #FFFFFF; /* White header text color */
    padding: 20px 0;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: stretch;
  }

  header h1 {
    font-size: 36px; /* Larger font size for the main heading */
    margin-bottom: 10px; /* Increased margin below the heading */
  }
  
  /* Menu Styles */
  nav {
    background-color: #f7ba05; /* Yellow menu background */
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

  nav ul li a {
    display: inline-block;
    padding: 10px 20px;
    color: #333333; /* Dark gray menu item text color */
    text-decoration: none;
    border-radius: 5px; /* Rounded corners for menu items */
    transition: background-color 0.3s ease; /* Smooth transition on hover */
  }

  nav ul li a:hover {
    background-color: #FFD900; /* Lighter yellow on hover */
    color: #333333; /* Dark gray text color on hover */
  }

  /* Main Content Styles */
  .content {
    padding: 20px;
    color: #333333; /* Dark gray text color */
  }

  .featured {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-top: 30px; /* Increased margin for better separation */
  }

  .featured-item {
    flex-basis: calc(33.33% - 20px);
    background-color: #FFFFFF; /* White background for featured items */
    padding: 20px;
    margin-bottom: 30px; /* Increased margin for better separation */
    border-radius: 10px; /* Rounded corners for featured items */
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); /* Soft shadow effect */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition on hover */
  }

  .featured-item:hover {
    transform: translateY(-5px); /* Move item up slightly on hover */
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Slightly larger shadow on hover */
  }

  .featured-item img {
    max-width: 100%;
    height: auto;
    margin-bottom: 15px; /* Increased margin below image */
  }

  /* Footer Styles */
  footer {
    background-color: #005792; /* Dark blue footer background */
    color: #FFFFFF; /* White footer text color */
    text-align: center;
    padding: 20px 0;
    width: 100%;
    bottom: 0;
  }

  footer p {
    margin-bottom: 10px; /* Increased margin below paragraph */
  }
</style>
</head>
<body>

<header>
  <h1>Welcome to Equipment Hire Company</h1>
  <p>Your one-stop destination for all your equipment rental needs</p>
</header>

<nav>
    <ul>
      <li><a href="#">Hiring of Equipment</a></li>
      <li><a href="#">Return of Equipment</a></li>
      <li><a href="#">Make a Payment</a></li>
      <li><a href="#">Stock Control Menu</a></li>
      <li><a href="#">File Maintenance Menu</a></li>
      <li><a href="#">Reports Menu</a></li>
      <li><a href="#">Quit</a></li>
    </ul>
  </nav>
  

  <?php include("insert.html");?>

<footer>
  <p>&copy; 2024 Equipment Hire Company. All rights reserved.</p>
  <p>Contact us: info@equipmenthirecompany.com | +1-123-456-7890</p>
</footer>

</body>
</html>
