<?php
session_start();
$email = $_SESSION['email'];



if (!isset($email)) {
	header('location:index.php');
	exit();
}

echo '
	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>family mirror - upload</title>
	<style>
		body,html{
			margin: 0;
			padding: 0;
			background: #efefef;
			overflow-y: hidden;
		}
		.container{
			width: 100%;
			height: 100vh;
			margin: 0;
			padding: 0;
		}
		form{
			width: 20%;
			margin: 10% auto;
		}
		p{
			font-size: 30px;
		}
		input[type=text]{
			background: none;
			outline: none;
			border-width: 0;
			border-bottom: 1px solid black;
			font-size: 15px;
			font-weight: 600;
			color: #5b5b5b;
		}
		input::placeholder{
			font-size: 15px;
			font-weight: 600;
			opacity: .7;
		}
		button{
			margin-left: 10px;
			width: 80px;
			padding: 5px;
			margin-top: 20px;
			font-size: 20px;
			font-weight: bold;
			color: #5b5b5b;
		}

		@media only screen and (min-width: 375px) {
			form{
				text-align: center;
			}
		}
	</style>
</head>
<body>
	<div class="container">
		<form action="send.php" method="post" enctype="multipart/form-data">
			<h1>Title</h1>
			<p>
				<input type="text" size="26" name="title" placeholder="eg: Animal sanctuary" required="">
			</p>
			<h1>Description</h1>
			<p>
				<textarea name="description" id="" cols="30" rows="6" maxlength="100" placeholder="eg: I love this baby puppy..." required=""></textarea>
			</p>
			<p>
				<input type="file" name="file" required="">
			</p>
			<p>
				<button type="submit" name="send">Post</button>
			</p>
		</form>
	</div>
</body>
</html>
';

?>

