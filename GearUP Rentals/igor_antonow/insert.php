<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="content">
<form action="insert.html" method="post" style="display: flex; flex-direction: column:">
<?php
//AUTHOR: IHOR ANTONOV
//STUDENT ID: C00291296
//DATE: 11/04/2024
include 'db.inc.php';//include the file that shall connect us to the database
date_default_timezone_set('UTC');
echo 'The details sent down are: <br>';

echo 'Surname is: ' . $_POST['surname'] . '<br>'; //output the name from the posted form
echo 'Firstname is: ' . $_POST['firstname'] . '<br>'; //output the name from the posted form

echo 'Address is: ' . $_POST['address'] . '<br>';
echo 'Eircode is: ' . $_POST['eircode'] . '<br>';
echo 'Phone Number is: ' . $_POST['phonenumber'] . '<br>';
echo 'Credit limit is: ' . $_POST['creditlimit'] . '<br>';

$id_sql = "SELECT MAX(customer.id) FROM customer";
if(!($result = mysqli_query($con, $id_sql))) {
    die(mysqli_error($con));
}
$new_id = (mysqli_fetch_array($result) [0]) + 1;
//this will add a new person to our db (after it's executed)
$sql = "INSERT INTO customer (id, surname, name, address, eircode, phone_no, money_balance, credit_limit) VALUES ($new_id, '$_POST[surname]', '$_POST[firstname]', '$_POST[address]', '$_POST[eircode]','$_POST[phonenumber]', 0, '$_POST[creditlimit]')";

if(!mysqli_query($con, $sql)) { //if the qurey doenst' worken'
    die('An error in the SQL query: ' . mysqli_error($con));//da php starign dien' and screamign "AAAA ERROR NUMBA BLAH BLAH"
}

echo '<br> A record has been added for ' . $_POST['firstname'] . '.';  

mysqli_close($con); // da connexion be closin'
?>
    <br>
    <input type='submit' class=".button" value='Return to Insert Page'> <!-- DA FORM FOR GOIN' BACC TO DA WEBSITE FOR PUT IN HUMAN DATA  -->
</form>
</div>
</body>
</html>