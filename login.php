
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="author" content=" Jacob Muzzy" />
	<meta name="description" content="login page for Baradji Diallo"/>
	<title> login </title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	
</head>
<?php include 'header.php'; ?>

<?php if (isset ( $_POST ['submit'] )) {
	$username = $_POST ['username'];
	$password = $_POST ['password'];
	$dbh = new SQLite3('users.db');
	$usernamefromdb = $dbh->querySingle("SELECT username FROM accounts WHERE username='".$username."';");//getting the username from the database
	$passwordfromdb = $dbh->querySingle("SELECT password FROM accounts WHERE username='".$username."';");
	if($username==$usernamefromdb){
		if (password_verify($password, $passwordfromdb)){
			$_SESSION["loggedIn"] = true;
			$_SESSION ['username'] = $username;
			header('Location: index.php');	
			//echo " You are now Logged in";
		}
		else {
			echo "login fail";	
		}
	}
	else{
		echo "<p>Username is incorrect</p>";
	}
	
	
}?>
	<div id="content">	
		<div id="main">
			<form id ="form" action="login.php" method="POST">
				<input type="text" size="20" name="username" placeholder="username"/>
				<br/>
				<input type="password" size="20" name="password" placeholder="password"/>
				<br/>
				<input type="submit" value="submit" name = 'submit'/>  <input type="submit" name="ForgotPassword" value="Forgot Password"/>
			</form>	


			<form action="create_account.php" method="POST">
		 		<input type="submit" name =create_account.php value="Create Account"/>
			</form>				

			</div>
			</div>



<?php if (isset($_POST['ForgotPassword'])) {
	header('Location: FMP.php');			
	}
?>





<?php 

include 'footer.php'; ?>
