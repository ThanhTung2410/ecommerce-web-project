<?php
session_start();

session_destroy();

setcookie("token", '', -1);

header("location: index.php");