<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$db = "ecommerce_web";
	$conn = new mysqli($hostname, $username, $password, $db);

	if ($conn->connect_errno) {
		die("Can not connect to db " . $conn->connect_error);
	}
?>