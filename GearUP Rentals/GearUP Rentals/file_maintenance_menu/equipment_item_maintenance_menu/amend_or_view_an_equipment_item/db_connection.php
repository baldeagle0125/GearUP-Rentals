<?php
/*
	File name: db_connection.php
	File purpose: Database connection file
	Student ID: C00290950
	Student name: Ihor Melashchenko
*/

// Database connection parameters
$hostname = "localhost:3306"; // Hostname of the MySQL server
$username = "ihor_m"; // Username for accessing the database
$password = "D8w5m9l2%"; // Password for accessing the database
$dbname = "eq_db"; // Name of the database to connect to

// Connect to the MySQL database
$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Check if connection was successful
if (!$conn) {
    // If connection fails, terminate script execution and display error message
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>