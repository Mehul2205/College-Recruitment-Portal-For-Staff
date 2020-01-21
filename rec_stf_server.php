<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

// Create connection
	$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS db1;";
if ($conn->query($sql) === FALSE) 
{
    echo "Database error 1";
}

$conn = new mysqli($servername, $username, $password, "db1");

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}


?>