<?php
$servername = "localhost";
$username = "root"; // Default username for WampServer
$password = ""; // Default password for WampServer
$dbname = "csv_db 5";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
