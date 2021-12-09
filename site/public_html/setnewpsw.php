<?php
session_start(); 



$psw = $_POST['newpsw'];
$new_password = password_hash($psw, PASSWORD_DEFAULT);

if(isset($_SESSION['emailu'])){
    $emailu = $_SESSION['emailu'];
    
    unset($_SESSION['emailu']);
}

// Create connection
$conn = new mysqli("localhost", "id17823239_db0username", "!Z8!p7NF{4!uoet(", "id17823239_db0");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  
  $sql = "UPDATE user SET password='$new_password' WHERE email='$emailu'";
  
  if ($conn->query($sql) === TRUE) {
    $sql1 = "DELETE from resetpsw where email = '$emailu'";
  } else {
    echo "Error updating record: " . $conn->error;
  }

  if ($conn->query($sql1) === TRUE) {
    header("location: login");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  
  $conn->close();
    ?>