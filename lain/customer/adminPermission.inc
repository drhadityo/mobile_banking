<?php
	session_start();
	if (!isset($_SESSION['isUser'])) {
		//header("Location: http://localhost/PAW/Challenge/11,12/Challenge4/login.php");
		header("Location: http://{$_SERVER['HTTP_HOST']}/PAW/PROJECT PAW/index.php");
		exit();
	}
?>