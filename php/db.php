<?php
$servername = "localhost";
$username = "root";
$password = "JTmusic@store";
$dbname = "music_store";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
