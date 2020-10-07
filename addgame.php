<?php
include("connection.php");
$Game = htmlentities($_POST["Game"]);
$Copies = htmlentities($_POST["Copies"]);
$stmt = $conn->prepare("INSERT INTO games(Name, Copies) VALUES(?,?)");
$stmt->bind_param("si",$Game,$Copies);

if($stmt->execute()){
    $res = "Data Inserted Successfully";
    echo json_encode("Data Inserted Successfully");
    $stmt->close();
}
else{
    $error = "not inserted";
    echo json_encode($error);
}
?>