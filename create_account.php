<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="author" content=" Jacob Muzzy" />
	<meta name="description" content=" fake home page"/>
	<title> Create Account </title>
	<link href="style.css" rel="stylesheet" type="text/css" />

</head>
<?php include 'header.php'; 
				$IP_Address = $_SERVER['REMOTE_ADDR'];//get the ip address from the url
				//echo "IP_Address: ".$IP_Address."</br>";
				$TrimIP_Address = substr($IP_Address,0,-4);//trim the ip address to only hold the first 8 characters
				//echo "TrimIP_Address: ".$TrimIP_Address."</br>";
				$AllowIP1 = "129.82.44";
				//echo "AllowIP1: ".$AllowIP1."</br>";
				$AllowIP2 = "129.82.45";
				//echo "AllowIP2: ".$AllowIP2."</br>";
				$AllowIP3 = "129.82.46";
				//echo "AllowIP3: ".$AllowIP3."</br>";
				

if(($TrimIP_Address == $AllowIP1) | ($TrimIP_Address == $AllowIP2) | ($TrimIP_Address == $AllowIP3)){

if (isset ( $_POST ['op'] )) {
	$firstname = strip_tags($_POST ['first']);
	$lastname = strip_tags($_POST ['last']);
	$middlename = strip_tags($_POST ['middle']);
	$phonenumber = strip_tags($_POST ['phone']);
	$email = strip_tags($_POST ['email']);
	$username = strip_tags($_POST ['username']);
	$password = strip_tags($_POST ['password']);
	$confirmpassword = strip_tags($_POST ['confirmPass']);
	
	
	$priordog = isset($_POST ['dog']);
	$priorcat = isset($_POST ['cat']);
	$priorturtle = isset($_POST ['turtle']);
	$interestedinfostering = isset($_POST ['fosteringPet']);
	$petneedshome = isset($_POST ['petNeedsHome']);
	$explination = strip_tags($_POST ['content']);
	if($password != $confirmpassword){
	echo "Passwords did not match, please try again!";	
	}else{
	$hashed = password_hash($password, PASSWORD_BCRYPT);	
		
		
	$dbh = new SQLite3('users.db');
	$insertuser = $dbh->exec("INSERT INTO accounts VALUES ("."'".$firstname."','".$lastname."','".$middlename."','".$phonenumber."','".$email."','".$username."','".$hashed."','".$priordog."','".$priorcat."','".$priorturtle."','".$interestedinfostering."','".$petneedshome."','".$explination."');");	
	
	echo"Your information has been saved";
	?>
	<a href="login.php">Log in</a>
	<?php
	}
	
	
	}else {
?>



	<div id="content">	
		
			<p>Please Enter Your Information to Create An Account</p>
			<form action="create_account.php" method="POST">
				<input type="text" size="20" name="first" placeholder="First Name"/>
				<br/>
				<input type="text" size="20" name="last" placeholder="Last Name"/>
				<br/>
				<input type="text" size="20" name="middle" placeholder="middle Initial (optional)"/>
				<br/>
				<input type="text" size="20" name="phone" placeholder="Phone Number"/>
				<br/>
				<input type="text" size="20" name="email" placeholder="Email">
				<br/>
				<input type="text" size="20" name="username" placeholder="Username">
				<br/>
				<input type="password" size="20" name="password" placeholder="Password"/>
				<br/>
				<input type="password" size="20" name="confirmPass" placeholder="Confirm Password"/>
				<br/>
				<p> Checkbox For Prior Pets</p>
				Dogs<input type="checkbox" name="dog" value="1">
				<br/>
				Cats<input type="checkbox" name="cat" value="1">
				<br/>
				Turtles<input type="checkbox" name="turte" value="1">
				<br/>
				<br/>
				Are you interested in fostering a pet? <input type="checkbox" name="fosteringPet" value="1">
				<br/>
				Do you have a pet needing a home? <input type="checkbox" name="petNeedsHome" value="1">
				<br/>
				 
			   	<textarea name="content" rows="5" cols="40" placeholder="If yes to the question above, explain why."></textarea><br/>
			    	<input type="hidden" value="done" name="op">
				<br/>
				<input type="submit" value="submit"/>
				
			</form>	
			
	
	</div>




<?php }include 'footer.php';
}
else{
	echo "<p>you do not have permission to access this page</p>";
}
 ?>

<!-- CREATE TABLE accounts(firstname varchar(30), lastname varchar(30), middlename varchar(30), phonenumber varchar(30), email varchar(30), username varchar(30), password text, priordog varchar(10), priorcat varchar(10), priorturtle varchar(10), fosteringpet varchar(10), explination text, petneedinghome varchar(10));
 -->


