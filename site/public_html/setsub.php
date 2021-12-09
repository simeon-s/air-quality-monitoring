<?php
session_start();
$week = strtotime("+7 day");
$month = strtotime("+1 month");
$year = strtotime("+1 year");

if($_POST['sub'] == "freeweek") {
    $sub = 'y';
    $subexp = date('Y-m-d', $week);
    //echo $_POST['sub'], $sub, $subexp;
} else if($_POST['sub'] == "1week") {
    $sub = "y";
    $subexp = date('Y-m-d', $week);
    //echo $_POST['sub'], $sub, $subexp;
} else if($_POST['sub'] == "1month") {
    $sub = 'y';
    $subexp = date('Y-m-d', $month);
    //echo $_POST['sub'], $sub, $subexp;
} else {
    $sub = 'y';
    $subexp = date('Y-m-d', $year);
    //echo $_POST['sub'], $sub, $subexp;
}




// Create connection
$conn = new mysqli("localhost", "id17823239_db0username", "!Z8!p7NF{4!uoet(", "id17823239_db0");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE user SET sub='$sub', subexp='$subexp'  WHERE username='$_COOKIE[username]';" ;

if ($conn->query($sql) === TRUE) {
    header("location: index");
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

?>