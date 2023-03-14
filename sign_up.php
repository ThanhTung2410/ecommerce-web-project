<?php

require_once "connect.php";
require_once "send_email.php";

if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
	die("Please provide enough information");
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if email has already existed
$sql = "SELECT * FROM customer WHERE email = ?";
$stm = $conn->prepare($sql);
$stm->bind_param("s", $email);
if (!$stm->execute()) {
	die($stm->error);
}
$result = $stm->get_result();


if ($result->num_rows == 1) {
	die("Email has already existed");
} else {
	$sql = "INSERT INTO customer(name, email, password) VALUES(?, ?, ?)";
	$stm = $conn->prepare($sql);
	$stm->bind_param("sss", $name, $email, $password);
	if (!$stm->execute()) {
		die($stm->error);
	}
}

header("location: index.php");