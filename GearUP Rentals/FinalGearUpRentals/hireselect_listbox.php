<?php
//AUTHOR: IHOR ANTONOV
//STUDENT ID: C00291296
//DATE: 11/04/2024
include "db.inc.php";
date_default_timezone_set('UTC');

$sql = "SELECT customer.id, surname, name FROM customer WHERE customer.is_deleted IS NULL OR customer.is_deleted = 0";

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
    echo "<option value = '$id'> $name $surname </option>";
}
echo "</select>";
mysqli_close($con);

?>