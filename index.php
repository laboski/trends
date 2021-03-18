<?php  
	// start session
	session_start();

	// check if session isset
	if (isset($_SESSION['uid'])) {
		echo "welcome";
	}
	

?>