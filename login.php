<?php

$usname = val($_POST['usname']);
$psword = val($_POST['psword']);

function val($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

require_once('db.php');

$sql = "SELECT * FROM users WHERE username='$usname' AND password='$psword'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$email = $row['email'];
		$username = $row['username'];
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		header("location:gallery.php");
	}
}else{
	header("location:index.php?error=IncorrectUsernameAndOrPassword");
}