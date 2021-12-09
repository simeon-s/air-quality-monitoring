<?php
session_start(); 
require 'includes/PHPMailer.php';
require 'includes/Exception.php';
require 'includes/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


function sendmail($email, $tooken, $fullname) {
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail -> isSMTP();
    $mail -> Host = "smtp.gmail.com";
    $mail -> SMTPAuth = "true";
    $mail ->  SMTPSecure = "tls";
    $mail -> Port = "587";
    $mail -> Username = "airquality101z@gmail.com";
    $mail -> Password = "A123456789b!";
    $mail -> Subject = "Breathe смяна на парола";
    $mail -> setFrom("airquality101z@gmail.com", 'Breathe');
    $mail -> Body = "Здравейте, $fullname,\n Получихме заявка за смяна на паролата!\n Можете да я смените на следния линк: https://air-monitoring.000webhostapp.com/newpsw?email=$email&tooken=$tooken \n Линкът е валиден до като паролата не бъде сменена или до 30 минути!";
    $mail -> addAddress($email);
    $mail -> Send();
    $mail -> smtpClose();
}


function generateRandomString($length = 30) {
  return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

function createTooken ($email, $tooken) {
$conn = new mysqli("localhost", "id17823239_db0username", "!Z8!p7NF{4!uoet(", "id17823239_db0");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql1 = "INSERT INTO resetpsw (email, tooken)
  VALUES ('$email', '$tooken')";

  if ($conn->query($sql1) === TRUE) {

  } else {
   echo "Error: " . $sql1 . "<br>" . $conn->error;
  }


$conn->close();
}

$email = $_POST['email'];



// Create connection
$conn = new mysqli("localhost", "id17823239_db0username", "!Z8!p7NF{4!uoet(", "id17823239_db0");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, fullname FROM user where email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION['msg'] = "Изпратен е имейл за смяна на паролата!";
        $_SESSION['col'] = "green";
        $fullname = $row['fullname'];
        $tooken = generateRandomString();
        createTooken($email, $tooken);
        sendmail($email, $tooken, $fullname);
        header("location: resetpsw");
    }
  } else {
    $_SESSION['msg'] = "Потребител с такъв имейл не е намерен!";
    $_SESSION['col'] = "red";
    header("location: resetpsw");
  }




$conn->close();
    ?>