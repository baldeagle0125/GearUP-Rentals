<!--
	Name: Emmanuel Abolade
	Student number:	C00288657
	Date: 08/02/2024
	Lab: 3
	Task: Task2 - view2.html
-->
<html>
  <head>
	  	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Task2 - view2.html</title>
  </head>
  <body>
	 
	  <?php include "menu.php"; ?>
	  <!-- Form to gather the equipment type number-->
	  <form action="ETview.php" method="POST">
		  <p><label>Enter the Equipment type ID of the record you want to view
			  <input type = "text" name = "ETid" id = "ETid" autocomplete=off required/> (Equipment type Id)
			  </label>
		  </p>
		  
		  <br><br>
		  <input type= "submit" value="Submit"/>
		  <input type= "reset" value="Clear"/>
		  
		<p>
	  </form>
										  

  </body>
</html>
