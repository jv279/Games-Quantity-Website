<?php
//Add your require statement here
require('connection.php') ;
$sql="SELECT * FROM games" ;
$result = $conn->query($sql);
$sql2="SELECT * FROM games" ;
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0)
{
$sum = 0;
while($row = $result2->fetch_assoc())
 {
$sum =$sum + $row['Copies'] ;
}
}


if ($result->num_rows > 0)
{
    
while($row = $result->fetch_assoc())
 {
$width = ($row['Copies'])*100/$sum ;
echo '</br> '.$row['Name'].' has '.$row["Copies"].' copies which is a stock percentage of '.round($width,2). '<svg width="100%" height="60">
<rect width="'.$width.'%" height="50" style="fill:rgb(232,134,56);stroke-width:3;stroke:rgb(0,0,0)" />
</br>
</svg>';
}


}

?>
