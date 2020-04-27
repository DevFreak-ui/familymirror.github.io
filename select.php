<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tetsing</title>
</head>
<body>
	<div class="container">
		<form method="POST" enctype="multipart/form-data">
			<p><input type="file" name="file"></p>
			<button type="submit" name="upload">Upload</button>
		</form>
	</div>
</body>
</html>

<?php

if (isset($_POST['upload'])) {
	$file = $_FILES['file'];

	$fileName = $file['name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileTmp = $file['tmp_name'];


	$fileExplode = explode(".", $fileName);
	$fileExt = strtolower(end($fileExplode));
	$Arr = array('jpg', 'jpeg', 'png');

	if (in_array($fileExt, $Arr)) {
		if (!$fileError) {
			if ($fileSize < 1000000) {
				$target = "images/".$fileName;
				$uploadFile = move_uploaded_file($fileTmp, $target);
				if ($uploadFile === TRUE) {
					
					$servername = "localhost";
					$username = "root";
					$password = "24350008822435";
					$dbname = "tests";

					$conn = new mysqli($servername, $username, $password, $dbname);

					if (!$conn) {
						die("Failed to connect to database");
					}
					$sql = "INSERT INTO entries (filepath) VALUES ('$target')";
					if ($conn->query($sql) === TRUE) {
						
						echo "Succesfully uploaded";
						}

						$sql = "SELECT filepath FROM entries";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo '<img src="'.$row["filepath"].'" width="150px">';
							}

						}else{
							echo "No record in database";
					}
				}


			}else{
				echo "File to big";
			}
		}else{
			echo "Error uploading the file";
		}
	}else{
		echo "File not supported";
	}




}


?>