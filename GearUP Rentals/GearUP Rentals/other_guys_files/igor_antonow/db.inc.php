<?php
//Student Name: Ihor Antonov // this is a header comment, // denotes a comment //this is a comment for my comment
//Student No. : C00291296
//Created on  : 31/01/2024

//taken from lab 3 for purposes of lab 3a
$hostname = "localhost:3306"; //this machine
$username = "superSecretAdmin";       //mysql uzername
$password = "M4rv1nR00lz";//mysql pass sword

$dbname="eq_db"; //the name of my database

$con = mysqli_connect($hostname, $username, $password, $dbname); //we invoke an sql connection function with login info as our arguments and the connection is stored in $con variable

if(!$con){ //if it didn't work out and $con variable is not
    die("Failed to connect to mysql: " . mysqli_connect_error()); //the script dies and is not alive anymore,
                                                                //giving out an error message with its final breath
}
?>