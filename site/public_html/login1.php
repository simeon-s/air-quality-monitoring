<?php
session_start();

$username = $_POST['username'];
$psw = $_POST['password'];



// Create connection
$conn = new mysqli("localhost", "id17823239_db0username", "!Z8!p7NF{4!uoet(", "id17823239_db0");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, password FROM user where username = '$username'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($username === $row["username"] && password_verify($psw, $row["password"])) {
            setcookie('username', $username, time()+60*60*7);  
            header("location: index");
          } else {
            $_SESSION['msg'] = "Неправилна парола!";
            header("location: login");
          }
    }
  } else {
    $_SESSION['msg'] = "Не е намерен такъв потребител!";
    header("location: login");
  }



$conn->close();


?>