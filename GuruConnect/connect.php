<?php
// Database connection settings
$servername = "localhost";
$username = "root"; 
$password = "";   
$dbname = "dataguru"; 

//http://localhost/GuruConnect/frontPage.html (link website)

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo "Connected successfully to MySQL database!";
}
?>