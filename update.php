<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Add your require statement here
require('connection.php') ;
$Copies = $_POST['Copies'];
$ID = $_POST['ID'];
//echo "test";
$sql="UPDATE games SET Copies=".$Copies." WHERE ID = ".$ID."";

if($conn->query($sql)===TRUE){
    //echo "worked";
}
//echo "it ran";
header("Location: homepage.php");

?>