<?php
header('Content-Type: text/json');
$db = new SQLite3('users.db');
$searchterm = $_GET['petId'];
$results = $db->query("SELECT * FROM animals2 WHERE ID =".$searchterm.";");

while ($row = $results->fetchArray()) {
    $src = $row['6'];
}
header("Access-Control-Allow-Origin: *");
echo  '{"description":"'.$src.'"}';
exit;
?>