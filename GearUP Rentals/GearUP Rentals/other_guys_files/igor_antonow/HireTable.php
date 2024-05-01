    <?php 
    //AUTHOR: IHOR ANTONOV
//STUDENT ID: C00291296
//DATE: 11/04/2024
    include "db.inc.php";
    date_default_timezone_set('UTC');
    ?>

    <form action="PersonReport.php" method="post" name="reportForm">
        <input type="hidden" name="choice">
</form>

<h1> Hire List</h1>
<h3>(Pick a hire and mark it as returned if you want to)</h3>
<br>
<br>

<?php
    if (true)
    {
?>
    <script>
        document.getElementById('dateButton').disabled = true;
        document.getElementById('nameButton').disabled = false;
    </script>
<?php 
    $sql = 'SELECT hire.id, hire.number_of_days, hire.duedate, hire.cost,
                   equipment_type.description, equipment_type.brand
            FROM hire, equipment_type, equipment_item
            WHERE (hire.is_deleted IS NULL OR hire.is_deleted = 0) AND hire.item_id = equipment_item.id AND equipment_item.type_id = equipment_type.id AND '. $_POST['listbox'] . ' = hire.customer_id
            ORDER BY hire.duedate DESC';
    produceReport($con, $sql);
    }
function produceReport($con, $sql)
{
    $result = mysqli_query($con, $sql);
    echo "<form onsubmit='return confirmHireReturn()' method=post action=ReturnOfEquipment.html.php>";
    echo "<table>
            <tr> <th></th><th>id</th> <th> Number of Days </th> <th> Date Due </th> <th>Cost Per Day</th> <th> Description</th> <th>Brand</th> <th>To Pay</th> </tr>";
    
            while ($row = mysqli_fetch_array($result))
            {
                echo "<tr> <td>";
                echo "<div class='radio'>";
                echo "<input class=radio type='radio' name='hire' value=$row[id] id='hire" . $row['id'] . "'></input>";
                echo "</div>";
                echo "</td>";
                echo "<td>";
                echo "<label for='hire". $row['id'] . "'>";

                echo $row['id'].'';
                echo "</label></td>";
                echo'
                <td>'.$row['number_of_days'].'</td>
                <td>'.$row['duedate'].'</td>
                <td>'.$row['cost'].'</td>
                <td>'.$row['description'].'</td>
                <td>'.$row['brand'].'</td>
                <td>'.$row['number_of_days'] * $row['cost']. '</td>
                </tr>';
                
            }
            echo '</table>';
    echo "<input type='submit' class='button' value='Return Hire'>";
    echo "</form>";
}
    mysqli_close($con);
?>
<script>
function confirmHireReturn() {
    return confirm("Are you sure you want to mark this hire as returned?");
}
</script>