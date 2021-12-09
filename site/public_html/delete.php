<?php
$username = $_COOKIE['username'];

// Create connection
$conn = new mysqli("localhost", "db0username", "j%<4JhKIs7m%bQ{r", "db0");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE from user where username = '$username'";
setcookie('username', $username, time()-1); 



  if ($conn->query($sql) === TRUE) {
    header("location: index");
} else {
    session_start();
    $_SESSION['msg']="Wrong password";
  header("location: account.php");
  }



$conn->close();
    ?>