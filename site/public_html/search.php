<?php


$city = $_POST['search'];




// Create connection
$conn = new mysqli("localhost", "id17823239_db0username", "!Z8!p7NF{4!uoet(", "id17823239_db0");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "select distinct city, location, url from connections\n"

    . "where city = '$city'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='result?url=".$row['url']."'>".$row['location'].", ". $row["city"]. "</a><br>
        ";
        

    }
} else {
    echo "0 results";
}



$conn->close();
?>