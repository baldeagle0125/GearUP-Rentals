<?php
//AUTHOR: IHOR ANTONOV
//STUDENT ID: C00291296
//DATE: 11/04/2024
include "db.inc.php";
date_default_timezone_set('UTC');

$sql = "SELECT id, surname, name, address, eircode, phone_no, credit_limit, money_balance FROM customer WHERE is_deleted IS NULL";

if (!$result = mysqli_query($con, $sql))
{
    die('Error in querying the database ' . mysqli_error($con));
}

echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>";

while ($row = mysqli_fetch_array($result))
{
    $id = $row['id'];
    $name = $row['name'];
    $surname = $row['surname'];
    $address = $row['address'];
    $eircode = $row['eircode'];
    $phone_no = $row['phone_no'];
    $credit_limit = $row['credit_limit'];
    $money_balance = $row['money_balance'];
    echo "<option value = '$id, $surname, $name, $address, $eircode, $phone_no, $credit_limit, $money_balance'> $name $sname </option>";
}
echo "</select>";
mysqli_close($con);

?>