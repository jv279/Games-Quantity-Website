<?php
require('connection.php') ;
$sql="SELECT * FROM games" ;
$result = $conn->query($sql);
$counter = 0;
if ($result->num_rows > 0)
{
    
 while($row = $result->fetch_assoc())
 {
    echo "
    <tr>
    <td> ".$row['ID']." </td>
    <td>" . $row['Name'] . "</td>
    <td>" .$row['Copies'] ."</td>
    </tr>
    " ; 
 }

}
else
{
echo "table is empty";
}

?>
