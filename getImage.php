<?php
$db = new SQLite3('users.db');
$searchterm = $_GET['petId'];
$results = $db->query("SELECT * FROM animals2 WHERE ID =".$searchterm.";");

while ($row = $results->fetchArray()) {
    $src = $row['5'];
}
header("Access-Control-Allow-Origin: *");
$str = file_get_contents($src, FILE_USE_INCLUDE_PATH);
echo base64_encode($str);
exit;
?>