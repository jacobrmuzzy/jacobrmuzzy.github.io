<?php
header('Content-Type: text/json'); 

$db = new SQLite3('users.db');
$counter = 0;
$results = $db->query("SELECT * FROM animals2");
$string = array();
while ($row = $results->fetchArray()) {
	$counter = $counter +1;
	$string[] = array("petName" => $row['1'],"petKind" => $row['2'], "breed" => $row['3'],"datePosted"=> $row['4'],"imageURL"=> "http://www.cs.colostate.edu/~jrmuzzy1/project3/getImage.php?petId=".$row['0'],"petId"=>$row['0'],"descURL"=>"http://www.cs.colostate.edu/~jrmuzzy1/project3/getDesc.php?petId=".$row['0']);
}
header("Access-Control-Allow-Origin: *");
echo json_encode($string);
?>