<?php
	$db = mysqli_connect('localhost', 'root', '', 'hashtags_db');

	// Evaluate connection
	if(mysqli_connect_errno()) {
		echo 'A problem occured, please try again later';
		exit();
	}
?>