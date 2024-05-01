<!--
	Name: Emmanuel Abolade
	Student number:	C00288657
	Date: 08/02/2024
	Lab: 3A
	Task: Task - db.inc.php
-->
<?php
    $hostname = "localhost:3306";    //Name of host or ip address
    $username = "superSecretAdmin";            //MySQL username - team-based username
    $password = "M4rv1nR00lz";            //MySQL password - team-based password

    $dbname = "eq_db";              //database Name - Changed and used by team 

    $con = mysqli_connect($hostname, $username, $password, $dbname);

    if(!$con)
        {
            die ("Failed to connect to MySQL: " . mysqli_connect_error());
        }

    
?>