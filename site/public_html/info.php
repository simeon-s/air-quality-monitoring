<?php

if (isset($_SESSION['url'])) {
    $url = $_SESSION['url'];
}

if (isset($_SESSION['type'])) {
    $type = $_SESSION['type'];
}
if (isset($_SESSION['time'])) {
    $time = $_SESSION['time'];
}

// Create connection
$conn = new mysqli("localhost", "id17823239_db0username", "!Z8!p7NF{4!uoet(", "id17823239_db0");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($time === "today" ) {
    $sql = "SELECT avg(temperature) as temperature, avg(humidity) as humidity, avg(gas) as gas, avg(pressure) as pressure, HOUR(time) as day FROM nodemcu_table, connections\n"
    . "where url = '$url'\n"
    . "and connections.sensor_id = nodemcu_table.sensor_id\n"
    . "and date = CURDATE()\n"
    . "GROUP BY day"; 
    $min = 00; $max = 24; 
}
if ($time === "week" ) {
    $sql = "SELECT avg(temperature) as temperature , avg(humidity) as humidity, avg(gas) as gas, avg(pressure) as pressure, DAYOFWEEK(date)-1 as day, date FROM nodemcu_table, connections\n"
    . "where url = '$url'\n"
    . "and connections.sensor_id = nodemcu_table.sensor_id\n"
    . "and YEARWEEK(date)=YEARWEEK(NOW())\n"
    . "GROUP BY day"; 
    $min = 1; $max = 7; 
}
if ($time === "month" ) {
    $month = (int) date("m");
    $sql = "SELECT avg(temperature) as temperature, avg(humidity) as humidity, avg(gas) as gas, avg(pressure) as pressure, DAY(date) as day, date FROM nodemcu_table, connections\n"
    . "where url = '$url'\n"
    . "and connections.sensor_id = nodemcu_table.sensor_id\n"
    . "and MONTH(date)=$month\n"
    . "GROUP BY day"; 
    $min = 1; $max = (int) date("t", strtotime(date("Y-m-d"))); 
}
$result = $conn->query($sql);


$dp = array();
$dataPoints = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $dp['x'] = $row['day'];
        if ($type === "temperature"){
           $dp['y'] = $row['temperature'];
           $ymin = -20; $ymax = 50;
           $title = "Температура";
        } else if ($type === "humidity") {
            $dp['y'] = $row['humidity'];
            $ymin = 10; $ymax = 90;
            $title = "Влажност";
        } else if ($type === "gas") {
            $dp['y'] = $row['gas'];
            $ymin = 0; $ymax = 110;
            $title = "Газове";
        } else if ($type === "pressure") {
            $dp['y'] = $row['pressure'];
            $ymin = 800; $ymax = 1200;
            $title = "Атмосферно налягане";
        }
        
        $dataPoints[] = ($dp);

        
    }
} else {
    echo "0 results";
}


$conn->close();


?>