<?php 
session_start();
$email = $_SESSION['email'];


if (!isset($email)) {
	header("location:index.php");
	exit();
}

	require_once('db.php');
	$sql = "SELECT * FROM gallery";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
		echo '
		<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/606510e8a3.js" crossorigin="anonymous"></script>
    <title>family mirror</title>
    <style>
    	nav{
    		box-shadow: 0 0 20px #888888;
    	}
    </style>
  </head>
  <body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
	  <a class="navbar-brand" href="logout.php">
	    <i class="fas fa-power-off"></i>
	  </a>
	  <div class="ml-auto">
	  	<a href="upload.php"><button type="submit" name="upload">Upload</button></a>
	  </div>
	</nav>



	<main>
		<div class="card-columns" style="margin: 0;padding: 0;margin-top: 70px;">
		';
		while ($row = mysqli_fetch_assoc($result)) {

			echo '
		
			<div class="card">
		    <img src="'.$row["imagepath"].'" class="card-img-top" alt="...">
		    <div class="card-body">
		      <h5 class="card-title">'.$row["title"].'</h5>
		      <p class="card-text">'.$row["description"].'</p>
		      <p class="card-text"><small class="text-muted">Posted on '.$row["time"].'</small></p>
		    </div>
		  </div>

			';
		}
		echo '

			</div>
	</main>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

		';
	}else{
		echo "NO POST AVAILABLE";
		echo '
		<br>
		<a href="upload.php"><button>Upload</button></a>
		';
	}

?>