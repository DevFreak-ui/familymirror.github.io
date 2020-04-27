<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>family mirror - login</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="overlay"></div>
		<div class="log">
				<form action="login.php" method="POST">
					<h1>LOGIN</h1>
					<table cellspacing="20" cellpadding="6">
						<tr>
							<td>Username</td>
							<td><input type="text" name="usname" required=""></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="psword" required=""></td>
						</tr>
						<tr>
							<td colspan="2"><button type="submit" name="submit">Login</button></td>
						</tr>
					</table>
				</form>
			</div>
	</div>
</body>
</html>