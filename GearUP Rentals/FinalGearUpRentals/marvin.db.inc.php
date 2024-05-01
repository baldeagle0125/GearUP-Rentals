<?php
    $hostname = "localhost:3306";    		//Name of host or ip address
    $username = "superSecretAdmin";         //MySQL username - team-based username
    $password = "M4rv1nR00lz";            	//MySQL password - team-based password
    $dbname = "eq_db";              		//database Name - Changed and used by team 
    $con = mysqli_connect($hostname, $username, $password, $dbname); //Connecting to database using hostname, username, password and database name
    if(!$con)								//Output if connection failed
        {
            die ("Failed to connect to MySQL: " . mysqli_connect_error());
        }   
?>