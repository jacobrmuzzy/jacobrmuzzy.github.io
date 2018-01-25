<!DOCTYPE H TML> 
<html lang="en-US">
</body>

<?php include 'header.php'; ?>
<?php
$name = $_GET["petName"]; 
$kind = ($_GET["petKind"]);
$breed = ($_GET["breed"]);
$dateposted=  ($_GET["datePosted"]);
$imgurl=  ($_GET["imageURL"]);
$descurl = ($_GET["descURL"]);
?>

<body
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="author" content=" Jacob Muzzy" />
	<meta name="description" content=" fake pet adoption page"/>
	<title> One Animal </title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	
	
	
	
	
	<div id="animalcontent">

	<h2><?php echo $name ?></h2>
	<h5>Kind</h5> 
		<p><?php echo $kind ?></p>
	<h5>Breed</h5> 
		<p><?php echo $breed ?></p> 
	<h5>Date Posted</h5> 
		<p><?php echo $dateposted ?></p>  
	<h5>Description</h5>

<?php 
    $content=file_get_contents($descurl);  // add your url which contains json file
    $json = json_decode($content, true);
    $count=count($json); 
    print_r("<p>".$json['description']."</p>");
    
    $image = $imgurl;
	 $imageData = (file_get_contents($image));
	 $src = 'data:image/jpg;base64,'.$imageData;
	 echo '<img src="'.$src.'" width= 320 height=320>';
?>
</div>

<?php include 'footer.php';?>