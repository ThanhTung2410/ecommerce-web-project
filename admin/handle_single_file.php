<?php

function handle_uploaded_file($uploaded_file, $max_file_size, $accepted_extensions, $dir, $locationToRedirect, $old_path = NULL)
{
	$size = $uploaded_file['size'];
	$filename = str_replace("/", "", date("Y/m/d")) . "-" . $uploaded_file['name'];
	$file_extension = pathinfo(basename($filename), PATHINFO_EXTENSION);

	if ($size > $max_file_size) {
		$_SESSION['errorMsg'] = "The maximum size of file is 5 MB";
		header("location:" . $locationToRedirect);
		exit;
	}

	if (!in_array($file_extension, $accepted_extensions)) {
		$_SESSION['errorMsg'] = "The file type is invalid";
		header("location:" . $locationToRedirect);
		exit;
	}

	$path = null;
	if (isset($old_path)) {
		$path = $old_path;
		move_uploaded_file($uploaded_file['tmp_name'], $old_path);
	} else {
		$path = $dir . $filename;
		move_uploaded_file($uploaded_file['tmp_name'], $path);
	}

	return $path;
}
