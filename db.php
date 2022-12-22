<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fap";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Não Conectou");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}