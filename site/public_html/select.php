<?php


// Create connection
$conn = new mysqli("localhost", "id17823239_db0username", "!Z8!p7NF{4!uoet(", "id17823239_db0");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = $_COOKIE['username'];

$sql = "SELECT acctype FROM user where username = '$username'";;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $acctype = $row['acctype'];
  }
} else {
  echo "0 results";
}
$conn->close();
?>