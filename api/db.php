<?php
$servername = "localhost";
$username = "root";
//$password = "";
$password = "redbytes";
$database="db689177143";

// Create connection
$con = new mysqli($servername, $username, $password,$database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
?>