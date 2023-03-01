<?php
	$conn = mysqli_connect('localhost', 'root', '', 'db_penjadwalan');

	if (isset($_POST['submit'])) {
		$usernameUser = $_POST['username'];
		$passwordUser = $_POST['password'];
		// $emailUser = $_GET['email']

		$resultQuery = mysqli_query($conn, "SELECT * FROM tb_login WHERE username = '$usernameUser'");

		$realData = mysqli_fetch_assoc($resultQuery);
		// var_dump($realData);
		$passwordFromDb = $realData['password'];
		// var_dump($passwordFromDb);
		mysqli_query($conn, "UPDATE tb_login SET password = '$passwordUser' WHERE username = '$usernameUser'");
		print("password sebelumnya : $passwordFromDb  | ");
		print("password sesudah di ubah : $passwordUser");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>lupa-password</title>
</head>
<body>
	<form method="POST">
		<table border="0">
			<tr>
			<td>Masukkan Username Anda</td>
			<td>
				<input name="username" type="text" /></td>
			</tr>
			<td>Masukkan Password Anda</td>
			<td>
				<input name="password" type="text" /></td>
			</tr>
			<!-- <td>
				<input name="email" type="text" /></td>
			</tr> -->
			<tr>
			<td></td>
			<td>
				<input name="submit" type="submit" value="submit" /> &nbsp <a href="login.php">kembali ke halaman login</a></td>
			</tr>
		</table>
	</form>
</body>
</html>