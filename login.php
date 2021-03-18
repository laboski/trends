<?php  
	// start session
	session_start();
	// get the needed files
	require 'app/conn.php';
	require 'controller/database.php';
	// load the database class
	$Database = new DatabaseModule($conn);

	// form control

	if (isset($_POST['submit'])) {
		$data = array(
						'email'      => $_POST['email'],
						'password'   => sha1($_POST['password'])
					 );
		// query
		$sql = 'SELECT email, password, is_admin WHERE email = :email AND password = :password';
		// save to session
		$_SESSION['uid'] = $Database->select($sql, $data)['uid'];
		$_SESSION['is_admin'] = $Database->select($sql, $data)['is_admin'];

		// redirect to index page
		header("Location: index.php");

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login as a member</title>
</head>
<body>
	<form action="index.php" method="post">
		<input type="email" name="email" placeholder="Email" required><br>
		<input type="password" name="password" placeholder="Password" required><br>
		<input type="submit" name="submit"><br>
	</form>
</body>
</html>

