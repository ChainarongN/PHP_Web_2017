<?php
// Create connection
$conn = new mysqli('localhost', 'root', '', 'project_repair');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");
 ?>
