<?php
session_start();

if (empty($_GET['id'])) {
	$_SESSION['errorMsg'] = "Please send ID";
	header('location: index.php');
	exit;
}

$id = $_GET['id'];

require_once "../../connect.php";
$sql = "DELETE FROM manufacturer WHERE id = ?";
$stm = $conn->prepare($sql);
$stm->bind_param("i", $id);
if(!$stm->execute()) {
	die($stm->error);
}

$conn->close();
header("location: index.php");