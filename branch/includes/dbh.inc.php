<?php

// Connect to database
$dbconn = new mysqli("localhost", "root", "admin", "lyza_system");

if ($dbconn->connect_error) {
    die("Connection failed: " . $dbconn->connect_error);
} 

?>

