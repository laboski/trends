<?php  
	// start session
	session_start();
	// if session isset
	if (!isset($_SESSION['uid'])) {
		header("Location: login.php");
	}
	// get the needed files
	require 'app/conn.php';
	require 'controller/database.php';
	// load the database class
	$Database = new DatabaseModule($conn);

	// form control

	if (isset($_POST['submit'])) {
		$data = array(
						'threadtopic'   => $_POST['topic'],
						'threadcontent' => $_POST['content'],
						'date_created' => date('m/d/Y')
					 );
		// query
		$sql = 'INSERT INTO `tthreads`(threadtopic, threadcontent, date_created)VALUES(:threadtopic, :threadcontent, :date_created)';
		$_SESSION['tid'] = $Database->create($sql, $data);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Become a member</title>
</head>
<body>
	<form action="join.php" method="post">
		<input type="text" name="topic" placeholder="Topic" required><br>
		<textarea name="content" placeholder="Content goes in here" required></textarea>
		<input type="submit" name="submit"><br>
	</form>
</body>
</html>

