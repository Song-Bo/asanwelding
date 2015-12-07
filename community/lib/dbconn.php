<?php
	$servername = "localhost";
	$dbuser = "root";
	$password = "1234";
	$db = "asan_db";

	// Create connection
	$conn = new mysqli($servername, $dbuser, $password, $db);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
?>