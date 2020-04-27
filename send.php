<?php
session_start();
$email = $_SESSION['email'];

$title = htmlspecialchars(val($_POST['title']));
$description = htmlspecialchars(val($_POST['description']));
$file = $_FILES['file'];

function val($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($email)) {
	$fileName = $file['name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileTmp = $file['tmp_name'];

	$fileExp = explode('.', $fileName);
	$fileExt = strtolower(end($fileExp));

	$allowed = array("jpg", "jpeg", "png");
	if (in_array($fileExt, $allowed)) {
		if ($fileSize < 1000000) {
			if ($fileError === 0) {
				$fileName = uniqid();
				$target = "images/".$fileName.".".$fileExt;
				$check = move_uploaded_file($fileTmp, $target);
				if ($check === TRUE) {
					require_once('db.php');
					$sql = "INSERT INTO gallery (title, description, imagepath) VALUES ('$title', '$description', '$target')";
					if (mysqli_query($conn, $sql) === TRUE) {
						header("location:gallery.php?UploadSuccess");
					}
				}else{
					echo "Error occured while uploading file";
				}
			}else{
				echo "Error uploading image";
			}
		}else{
			echo "File too big";
		}
	}else{
		echo "Upload pictures only";
	}

}else{
	header("location:index.php");
	exit();
}



