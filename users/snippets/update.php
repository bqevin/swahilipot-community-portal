<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swahilipot";


if(isset($_POST['update']))
{
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $name = strip_tags($_POST['name']);
     $gender = strip_tags($_POST['gender']);
     $tel = strip_tags($_POST['tel']);
     $email = strip_tags($_POST['email']);
     $cartegory = strip_tags($_POST['cartegory']);
     $address = strip_tags($_POST['address']);
     $bio = strip_tags($_POST['bio']);
     $website= strip_tags($_POST['website']);


    $sql = "UPDATE users SET name='$name', gender='$gender', tel='$tel', email='$email', cartegory='$cartegory', address='$address', bio='$bio', website='$website' WHERE email= '$email' ";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
     header('Location: ../edit-profile.php');  

    // echo a message to say the UPDATE succeeded
     //echo $stmt->rowCount() . " records UPDATED successfully";
     
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}
?> 
