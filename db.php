<?php

$servername = "sql313.epizy.com";
$username = "epiz_25633032";
$password = "DZYCq0tZdV";
$dbname = "epiz_25633032_project1";

$conn = mysqli_connect('$servername', '$username', '$password', '$dbname');

if (!$conn) {
	die("connection failed"). mysqli_connect_error();
}