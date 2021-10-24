// Code Written by Rishi Tiwari
// Website:- https://tricksumo.com
// Reference:- https://www.w3schools.com/php/php_mysql_insert.asp
//
//

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

else { echo "Connected to mysql database. "; }

   
// Get date and time variables
    date_default_timezone_set('Europe/Sofia');  // for other timezones, refer:- https://www.php.net/manual/en/timezones.asia.php
    $d = date("Y-m-d");
    $t = date("H:i:s");
    
// If values send by NodeMCU are not empty then insert into MySQL database table

  if(!empty($_POST['humidity']) && !empty($_POST['temperature']) )
    {
		$humidity = $_POST['humidity'];
        $temperature = $_POST['temperature'];
        $pressure = $_POST['pressure'];
        $gas = $_POST['gas'];

// Update your tablename here
	        $sql = "INSERT INTO nodemcu_table (humidity, temperature,pressure, gas, Date, Time) VALUES 
         ('".$humidity."','".$temperature."','".$pressure."','".$gas."', '".$d."', '".$t."')"; 
		if ($conn->query($sql) === TRUE) {
		    echo "Values inserted in MySQL database table.";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	

 


		if ($conn->query($sql) === TRUE) {
		    echo "Values inserted in MySQL database table.";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


// Close MySQL connection
$conn->close();



?>
