<?php
$host = $_SERVER ['HTTP_HOST'];
$uri = rtrim ( dirname ( $_SERVER ['PHP_SELF'] ), '/\\' );
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="author" content=" Jacob Muzzy" />
	<meta name="description" content="login page for Baradji Diallo"/>
	<title> Password Reset </title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	
</head>
<?php include 'header.php'; ?>


 	<div class="header">
		<h2> Password Reset Page </h2>
	</div>
	<div class="contents">
	
		<?php if($_SESSION ['key'] == $_GET['key']): ?>
			<p>Please enter a new password:</p>
			<form action="passwordreset.php?key=<?php echo $_GET['key']?>" method="POST">
				<input type="password" size="20" name="newPassword" placeholder="Password"/>
				</br>
				<input type="password" size="20" name="ConfirmPassword" placeholder="Confirm Password"/>
				<input type="submit" name="submit" value="Submit"/>
			</form>
		
			<?php else : echo"<p>You do not have permission to view this page";?>
		
		<?php endif; ?>
	
		<?php if (isset($_POST['newPassword']) && isset($_POST['ConfirmPassword'])) { 
				$newPassword = $_POST['newPassword'];
				$ConfirmPassword = $_POST['ConfirmPassword'];
					if($newPassword==$ConfirmPassword){
						$hashPassword = password_hash ( $_POST ['newPassword'], PASSWORD_BCRYPT );
						$username = $_SESSION ['username']; 
						$dbh = new SQLite3('users.db');
						$UpdateUserPassfromdb = $dbh->querySingle("UPDATE accounts set password='".$hashPassword."'WHERE username='".$username."';");//updating the username from the database
						header ( "Location: https://$host$uri/login.php" );
					
					}	
					else{
						echo "Passwords does not much. Please try again";
					}		
			}

		?>
		
		
		
	</div>
<?php include 'footer.php'; ?>
