<?php
session_start();

if (empty($_POST['id'])) {
	$_SESSION['errorMsg'] = "Please send ID";
	header("location: index.php");
	exit;
}

$id = $_POST['id'];

if (empty($_POST['old_img_path']) || empty($_POST['name'])) {
	$_SESSION['errorMsg'] = "Invalid please submit again with valid information";
	header("location: form_update.php?id=$id");
	exit;
}

$name = $_POST['name'];
$old_path = $_POST['old_img_path'];
$uploaded_file = $_FILES['new_img'];

require_once "../handle_single_file.php";

// change new logo
if (!$uploaded_file['error']) {
	$max_file_size = 2 * 1024 * 1024;
	$accepted_extensions = array('png', 'jpg');
	$dir = "../../img/manufacturer_logo/";
	$locationToRedirect = "form_update.php";
	$path = handle_uploaded_file($uploaded_file, $max_file_size, $accepted_extensions, $dir, $locationToRedirect, $old_path);
}
// else want to keep old logo

require_once "../../connect.php";
$sql = "UPDATE Manufacturer SET name = ? WHERE id = ?";
$stm = $conn->prepare($sql);
$stm->bind_param("si", $name, $id);
if (!$stm->execute()) {
	die($stm->error);
}

$conn->close();
header("location: index.php");
