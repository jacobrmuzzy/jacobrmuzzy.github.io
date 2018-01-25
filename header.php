<?php
session_start(); 
include 'passwordLibClass.php';
include 'passwordLib.php';

?>
<body>
	<div id="wrapper">
		<div id="header"> 
			<img src="pawprint.png" height="50" alt="paw print" />
			<h2> MIXED PAW'S RESCUE </h2>
			<div id="nav">
			<ul>
				<li>
					<a href="index.php">HOME</a>
				</li>
				<li>
					<a href="about_us.php">ABOUT US </a>
				</li>
				<li>
					<a href="list_of_dogs.php">ADOPTABLE ANIMALS</a>
				</li>
				<li>
					<a href="create_account.php">CREATE ACCOUNT</a>
				</li>
				<li>
					<a href="http://www.cs.colostate.edu/~tnerb/CT310/Proj3/status.php">STATUS OF FEDERATION SITES</a>
				</li>
				<li>
					<a href="http://www.cs.colostate.edu/~tnerb/CT310/Proj3/pets.php">EXTRA PAGE FOR PET DATA</a>
				</li>
				<li>
					<a href="addAdoptableAnimal.php">ADD AN ANIMAL FOR ADOPTION</a>
				</li>			
				<?php if (isset($_SESSION["username"])){ ?>
				<li>
				<a href="logout.php">LOGOUT</a>
				</li>
				<?php }else{ ?>
				<li>
				<a href="login.php">LOGIN</a>
				</li>
				<?php } ?>	
		

				

			</ul>
			
		</div>
	</div>

