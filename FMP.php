<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="author" content=" Jacob Muzzy" />
	<meta name="description" content="login page for Baradji Diallo"/>
	<title> Forgot My Password </title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	
</head>
<?php include 'header.php'; ?>

 	<div class="header">
		<h2> Forgot My Password Page </h2>
	</div>
	<div class="contents">
		<p>Enter your username to send an email to your account:</p>
		<form action="FMP.php" method="post">
			<input type="text" size="20" name="username" placeholder="username"/>
			<input type="submit" name =SendEmail value="Send Email"/>
		</form>
		
	<?php
	
		if (isset ( $_POST ['SendEmail'] )) {
			$username = strip_tags($_POST ['username']);//user that forgot their password
			$dbh = new SQLite3('users.db');
			$usernamefromdb = $dbh->querySingle("SELECT username FROM accounts WHERE username='".$username."';");//getting the username from the database
			if($username == $usernamefromdb){ //checking to see if the user exit in the database 
				$userEmail = $dbh->querySingle("SELECT email FROM accounts WHERE username='".$username."';");//getting the user emailfrom the database
				$_SESSION ['username'] = $username; //to keep track of the person the email was send to
				$host = $_SERVER ['HTTP_HOST'];
				$uri = rtrim ( dirname ( $_SERVER ['PHP_SELF'] ), '/\\' );
				$key = 'abcdefghegklmnopqrstuvwxyz012345';
				$shuffledKey = str_shuffle($key);
				$_SESSION ['key'] = $shuffledKey; //to keep track of the key that was send in to the user email
				$subject = "Reset Password";
				$content = "https://$host$uri/passwordreset.php?key=$shuffledKey";	
				if(mail($userEmail, $subject, $content)){
					echo "<p>Your email was successfully sent<p>";
				}
			}
			else{
				echo "<p>Username is incorrect</p>";			
			}
		}
	?>
	</div>


<?php include 'footer.php'; ?>
