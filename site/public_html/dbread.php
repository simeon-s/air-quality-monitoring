// All of the readings
<?php



$host = "localhost";		         // host = localhost because database hosted on the same server where PHP files are hosted
$dbname = "id17823239_db0";              // Database name
$username = "id17823239_db0username";		// Database username
$password = "!Z8!p7NF{4!uoet(";	        // Database password


// Establish connection to MySQL database
$conn = new mysqli($host, $username, $password, $dbname);


// Check if connection established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else { echo "Connected to mysql database. <br>"; }


// Select values from MySQL database table

$sql = "SELECT id, humidity, temperature,pressure,gas, date, time FROM nodemcu_table";  // Update your tablename here

$result = $conn->query($sql);

echo "<center>";



if ($result->num_rows > 0) {


    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo 
        "<strong> Id:</strong> " . $row["id"].
        " &nbsp <strong>humidity:</strong> " . $row["humidity"]. 
        " &nbsp <strong>temperature:</strong> " .  $row["temperature"]. 
        " &nbsp <strong>pressure:</strong> " .  $row["pressure"]. 
        " &nbsp <strong>gas:</strong> " .  $row["gas"]. 
        " &nbsp <strong>Date:</strong> " . $row["date"]." &nbsp <strong>Time:</strong>" .$row["time"]. "<p>";
    


}
} else {
    echo "0 results";
}

echo "</center>";

$conn->close();



?>
