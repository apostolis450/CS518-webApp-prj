<?php
//Initialization of the connection with DB happens here.
$dBServername = "mysql-server";
$dBUsername = "root";
$dBPassword = "test123456";
$dBName = "my_db";

// Create connection
$conn = new mysqli($dBServername, $dBUsername, $dBPassword, $dBName) ;
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";