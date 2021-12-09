<?php
session_start();


$fullname = $_SESSION['fullname'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];

if($_POST['acctype'] == "За преглед на информация") {
  $type = "w";
} else {
  $type = "u";
}

// Create connection
$conn = new mysqli("localhost", "id17823239_db0username", "!Z8!p7NF{4!uoet(", "id17823239_db0");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (fullname, username, password, email, acctype)
VALUES ('$fullname', '$username', '$password', '$email', '$type')";

if ($conn->query($sql) === TRUE) {
  setcookie('username', $username, time()+60*60*7);  
  header("location: subtype");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
session_destroy();

?>