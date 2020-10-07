<?php
//Add your require statement here
require('connection.php') ;
$sql="SELECT * FROM games" ;
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
    
    echo "<style>
    #tableStyle {
        font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    }
    
    
    #tableStyle tr:nth-child(odd){background-color: #f2f2f2;}
    #tableStyle tr:hover {background-color: #ddd;}
    
    #tableStyle th {
        padding-top: 2px;
        padding-bottom: 2px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
    </style>
    <table id='tableStyle'>
    <tr><td>Name of Game</td>
    <td>Number of Copies</td>
    <td>Edit Copies</td></tr>
    
    ";
 while($row = $result->fetch_assoc())
 {
    echo "
    <tr>
    <td>" . $row['Name'] . "</td>
    <td>" .$row['Copies'] ."</td>
    <td>  
    <form method='POST' action='update.php'>
    <input type='number' name= 'Copies' min='0' max='999999' value = ".$row['Copies'].">
    <input type='hidden' name= 'Name' value = ".$row['Name'].">
    <input type='hidden' name= 'ID' value = ".$row['ID'].">
    <input type='submit'></td> 
    </form>
    </tr>
    " ; 
 }
 echo "


 </table>";
}
else
{
echo "table is empty";
}

?>
