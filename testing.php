
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>test</title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" name="post" value="Post">
</body>
</html>


<?php 

	if (isset($_POST['post'])) {
		$targetpath = "images/".basename($_FILES['file']['name']);
		if (move_uploaded_file($_FILES['file']['tmp_name'], $targetpath) === TRUE) {
			
			$conn = new mysqli('localhost', 'root', '24350008822435', 'tests');

			$sql = "INSERT INTO entries (filepath) VALUES ('$targetpath')";
			if ($conn->query($sql) == TRUE) {

				$sql = "SELECT filepath FROM entries";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo "<img src='".$row['filepath']."' alt=''/>";
					}



				}else{
					echo "No data in database";
				}
			}

		}else{
			echo "Unable to upload file";
		}

	}else{
		echo "Please select a file";
	}

 ?>