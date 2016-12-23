<?php
// Turn off all error reporting
// /error_reporting(0);
//including the database connection file
// include_once("pages/config.php");
// ini_set('memory_limit', '-1');

$host = "localhost";
$user ="swahilih_member";
$pass ="B^20TDb+P3.=";
$db ="swahilih_members";

if($conn = @mysqli_connect($host, $user, $pass, $db)){
    $sql = "SELECT * from users where status = 1";
    $json = array();
    $result = mysqli_query($conn, $sql);
    
        while($row = mysqli_fetch_array($result))
       
        {
            $status = $row['status'];
            switch ($status) {
                case '0':
                    $status = "pending";
                    break;

                case '1':
                    $status = "Active";
                    break;
                
                case '2':
                    $status = "Deactivated";
                    break;
            }

            $gender = $row['gender'];
            switch ($gender) {
                case 'M':
                    $gender = "Male";
                    break;

                case 'F':
                    $gender = "Female";
                    break;
                }

            $member = array(
                'name' => $row['name'],
                'gender' => $gender,
                'regno' =>  $row['reg_no'],
                'email' => $row['email'],
                'category' =>  $row['category'],
                'profilePic' =>  $row['profile_pic'],
                'status' =>  $status,
                'website' =>  $row['website'],
                'bio' =>  $row['bio'],
                'created' =>  $row['created'],
                'bounties' =>  $row['bounties']

            );
            array_push($json, $member);
        }

    $jsonstring = json_encode($json);
    echo $jsonstring;
    header('Content-Type: application/json');
    die();
    }
die("error");

?>