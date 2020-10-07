<?php
session_start();

require('connection.php') ;

if ( isset ($_POST["Username"]) && isset($_POST["Password"]))
{
  $username = htmlentities($_POST["Username"]) ;
  $password = htmlentities($_POST["Password"]) ;
  validateUser($conn, $username, $password) ;

}


function validateUser($conn, $username, $password)
{
  $username = $conn->real_escape_string($username);


  $sql ="SELECT * FROM users WHERE Username = '$username'";

  $result = $conn->query($sql);
  if ($result->num_rows > 0)
  {
    // output data of each row
    while($row = $result->fetch_assoc())
    {
        $hashed_password = $row["Password"];

        //Check to see if our password is equal to our user input
        if ($hashed_password === hash("md5", $password))
        {
          $_SESSION["appuser"] = $username ; // Initializing Session
          header("Location: homepage.php");
          exit();
        }
        else
        {
          $error = "Invalid Password" ;
          $_SESSION["apperror"] = $error ;
          header("Location: index1.php");
        }
    }

  }
  else
  {
    $error = "Username not found in the database" ;
    $_SESSION["apperror"] = $error ;
    header("Location: index1.php");
  }
  $conn->close();
}


?>