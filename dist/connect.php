<?php
$servername = "localhost";
$username = "root";
$password = "event";
$database="event";

// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?> 
