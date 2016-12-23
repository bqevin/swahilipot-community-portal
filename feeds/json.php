<?php
// Turn off all error reporting
// /error_reporting(0);
//including the database connection file
include_once("pages/config.php");

$sql = "SELECT * from updates ORDER BY id DESC";
$json = array();
$result = mysqli_query ($mysqli, $sql);
while($row = mysqli_fetch_array ($result))     
{
    $feed = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'image' =>  $row['image'],
        'status' =>  $row['status'],
        'profilePic' =>  $row['profilePic'],
        'timeStamp' =>  strtotime($row['timeStamp']),
        'url' =>  $row['url']
    );
    array_push($json, $feed);
}

$jsonstring = json_encode(array('feed' => $json));
echo $jsonstring;
header('Content-Type: application/json');
die();
?>  
