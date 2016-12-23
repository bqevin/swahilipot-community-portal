<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swahilipot";


if(isset($_POST['update_pass']))
{
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $password = strip_tags($_POST['password']);

    $sql = "UPDATE users SET password=:$newpass where password=:$oldpass";
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();

    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}
?> 