<?php
session_start();

require_once "connect.php";

if (empty($_POST['email']) || empty($_POST['password'])) {
	die("Please provide enough information");
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM customer where email = ? and password = ?";
$stm = $conn->prepare($sql);
$stm->bind_param("ss", $email, $password);
if (!$stm->execute()) {
	die($stm->error);
}
$result = $stm->get_result();

if ($result->num_rows == 1) {
	$row = $result->fetch_assoc();
	$_SESSION['id'] = $row['id'];
	$_SESSION['name'] = $row['name'];
	$_SESSION['avatar'] = $row['avatar'];
	if (isset($_POST['remember_me'])) {
		$token = uniqid("user_");
		setcookie('token', $token, time() + 1000 * 36000);
		$sql = "UPDATE customer SET token = ? WHERE id = ?";
		$stm = $conn->prepare($sql);
		$stm->bind_param("si", $token, $row['id']);
		if(!$stm->execute()) {
			die($stm->error);
		}
	}
} else {
	die("Email or password invalid");
}

header("location: index.php");
