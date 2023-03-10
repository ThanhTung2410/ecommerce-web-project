<?php
session_start();

if (empty($_POST['id'])) {
	$_SESSION['errorMsg'] = "Please send ID";
	header("location: index.php");
	exit;
}

$id = $_POST['id'];

if (empty($_POST['old_img_path']) || empty($_POST['name']) ||  empty($_POST['price']) ||  empty($_POST['description']) || empty($_POST['manufacturer_id'])) {
	$_SESSION['errorMsg'] = "Invalid please submit again with valid information";
	header("location: form_update.php?id=$id");
	exit;
}

$name = $_POST['name'];
$old_path = $_POST['old_img_path'];
$uploaded_file = $_FILES['new_img'];
$price = $_POST['price'];
$description = $_POST['description'];
$manufacturer_id = $_POST['manufacturer_id'];

require_once "../handle_single_file.php";

// change new image
if (!$uploaded_file['error']) {
	$max_file_size = 2 * 1024 * 1024;
	$accepted_extensions = array('png', 'jpg');
	$dir = "../../img/product/";
	$locationToRedirect = "form_update.php";
	$path = handle_uploaded_file($uploaded_file, $max_file_size, $accepted_extensions, $dir, $locationToRedirect, $old_path);
}
// else want to keep old image

require_once "../../connect.php";
$sql = "UPDATE product SET name = ?, price = ?, description = ?, manufacturer_id = ? WHERE id = ?";
$stm = $conn->prepare($sql);
$stm->bind_param("sdsii", $name, $price, $description, $manufacturer_id, $id);
if (!$stm->execute()) {
	die($stm->error);
}

$conn->close();
header("location: index.php");
