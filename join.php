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
						'username'   => $_POST['username'],
						'password'   => sha1($_POST['password']),
						'email'      => $_POST['email'],
						'phone'      => $_POST['phone'],
						'gender'     => $_POST['gender'],
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'is_admin' => 0,
						'date_created' => date('m/d/Y'),
						'bio' => $_POST['bio']
					 );
		// query
		$sql = 'INSERT INTO `users`(username, password, email, phone, gender, ip_address, is_admin, date_created, bio)VALUES(:username, :password, :email, :phone, :gender, :ip_address, :is_admin, :date_created, :bio)';
		$_SESSION['uid'] = $Database->create($sql, $data);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Become a member</title>
</head>
<body>
	<form action="join.php" method="post">
		<input type="text" name="username" placeholder="Username" required><br>
		<input type="password" name="password" placeholder="Password" required><br>
		<input type="email" name="email" placeholder="Email" required><br>
		<input type="text" name="phone" placeholder="Phonenumber" required><br>
		<select name="gender">
			<option>Male</option>
			<option>Female</option>
		</select><br>
		<input type="text" name="bio" placeholder="Biography" required><br>
		<input type="submit" name="submit"><br>
	</form>
</body>
</html>

