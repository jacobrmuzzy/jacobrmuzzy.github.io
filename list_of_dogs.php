
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="author" content=" Jacob Muzzy" />
	<meta name="description" content=" fake pet adoption page"/>
	<title> Adoptable Animals </title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	
</head>
<?php include 'header.php'; ?>	
	
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script type="text/javascript" >
		$(document).ready(function () {
			$.getJSON("https://www.cs.colostate.edu/~ct310/yr2016sp/more_assignments/project03masterlist.php", function (result) {
				$.each(result, function (i) {
						$.getJSON(result[i].petsListURL, function (result1) {
							$.each(result1, function (h) {
							 
							
									$("#result").append(
									"<h5>" + result1[h].petName + "</h5>" + "Pet Kind: " + result1[h].petKind  + "<br>" + "Breed: " + result1[h].breed + "<br>" + "Date Posted: " + result1[h].datePosted + "<br>"  + "Pet ID number: " + result1[h].petId + "<br>"
									+ "<a href='http://www.cs.colostate.edu/~jrmuzzy1/project3/moreaboutyourpet.php?petName=" + result1[h].petName + "&petKind=" + result1[h].petKind +   "&breed=" + result1[h].breed + "&datePosted=" + result1[h].datePosted + "&imageURL=" + result1[h].imageURL + "&descURL=" + result1[h].descURL+"'> link to read more </a><br><br>"
									);
 								
 
 
							});// each function
							$("#result").append("<br>");
						});						
					
					
					
					 
				});// each function
			});// getJSON masterlist.php function
		});// document.ready
	</script>
	
	
	
		<div id="result"> <style type="text/css">
		#result{text-align: center;}
		</style></div>
</body>
<?php include 'footer.php'; ?>