<?php
$servername = "localhost";
$username = "23mca053";
$password = "2390";
$db = "23mca053";

$conn = mysqli_connect($servername, $username, $password, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
