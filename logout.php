<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="author" content="Baradji Diallo, Alenxander Henning" />
		<meta name="description" content="logout page"/>
		<title> logout</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		
	</head>
			
	<body>
	
		<?php
			//start the session
			session_start();
			// remove all session variables
			session_unset();
			// destroy the session
			session_destroy(); 
			//once the user successfully logout take them to login.php page
			header('Location: index.php');
		?>
		
		
	</body>
</html>


