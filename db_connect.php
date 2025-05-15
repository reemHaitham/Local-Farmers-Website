<?php
// db_connect.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "localFarmers";

// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("<p style='color:red;'>Connection failed: " . htmlspecialchars($conn->connect_error) . "</p>");
        }
?>