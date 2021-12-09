<?php
session_start();


// Create connection
$conn = new mysqli("localhost", "id17823239_db0username", "!Z8!p7NF{4!uoet(", "id17823239_db0");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql_u = "SELECT username FROM user where username = '$_POST[username]'";
$sql_e = "SELECT email FROM user where email = '$_POST[email]'";

$res_u = $conn->query($sql_u);
$res_e = $conn->query($sql_e);



if ($res_u -> num_rows == 0 && $res_e -> num_rows == 0) {
  $_SESSION["fullname"] = $_POST['fullname'];
  $_SESSION["username"] = $_POST['username'];
  $psw = $_POST['password'];
  $_SESSION["email"] = $_POST['email'];
  $_SESSION["password"] = password_hash($psw, PASSWORD_DEFAULT);
  header("location: acctype");
}else if ($res_u->num_rows > 0 && $res_e -> num_rows > 0) {
  $_SESSION['msg'] = "Потребителското име и имейлът вече се използват!";
  header("location: registration"); 	
}else if($res_e -> num_rows > 0){
  $_SESSION['msg'] = "Имейлът вече се използва!";
  header("location: registration"); 	 	
} else if ($res_u->num_rows > 0) {
  $_SESSION['msg'] = "Потребителското име вече се използва!";
  header("location: registration"); 	
} 

$conn->close();


?>