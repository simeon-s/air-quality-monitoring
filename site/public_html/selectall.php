<?php

// Create connection
$conn = new mysqli("localhost", "id17823239_db0username", "!Z8!p7NF{4!uoet(", "id17823239_db0");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_COOKIE['username'])){
    $username = $_COOKIE['username'];
}

$sql = "SELECT * FROM user where username = '$username'";;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $name = $row['fullname'];
    $username = $row['username'];
    $email = $row['email'];
    $subexp = $row['subexp'];
  }
} else {
  echo "0 results";
}
$conn->close();
?>