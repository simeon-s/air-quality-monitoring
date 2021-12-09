<?php
if (isset($_GET['tooken']) && isset($_GET['email'])){
    $emailu = $_GET['email'];
    $_SESSION['email'] = $emailu;
    $tookenu = $_GET['tooken'];
}

// Create connection
$conn = new mysqli("localhost", "id17823239_db0username", "!Z8!p7NF{4!uoet(", "id17823239_db0");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT email FROM resetpsw where email = '$emailu' and tooken = '$tookenu'";;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $_SESSION['emailu'] = $emailu;
  }
} else {
  header("location: index");
}
$conn->close();

?>