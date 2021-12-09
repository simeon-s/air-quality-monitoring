<?php
session_start(); 
$username = $_COOKIE['username'];
$old_psw = $_POST['old_psw'];
$new_psw = $_POST['new_psw'];
$new_password = password_hash($new_psw, PASSWORD_DEFAULT);


// Create connection
$conn = new mysqli("localhost", "id17823239_db0username", "!Z8!p7NF{4!uoet(", "id17823239_db0");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT password FROM user where username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if (password_verify($old_psw, $row["password"])) {
            if ($old_psw == $new_psw) {
                $_SESSION['msg']="Паролата не може да е същата!";
                header("location: changepass");
            } else {
                 $sql1 = "UPDATE user set password = '$new_password' where username = '$username'";
                 
                
            }
            
          } else {
             $_SESSION['msg']="Паролата е неправилна!";
             header("location: changepass");
          }
    }
  }

 if ($conn->query($sql1) === TRUE) {
  header("location: index");
} 


$conn->close();
    ?>