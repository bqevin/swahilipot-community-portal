
<?php

$fileName = $_FILES["uploaded_file"]["name"]; 
$fileTmpLoc = $_FILES["uploaded_file"]["tmp_name"]; 
$fileType = $_FILES["uploaded_file"]["type"]; 
$fileSize = $_FILES["uploaded_file"]["size"]; 
$fileErrorMsg = $_FILES["uploaded_file"]["error"]; 
$kaboom = explode(".", $fileName); 
$fileExt = end($kaboom); 
if (!$fileTmpLoc) { 
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
} else if($fileSize > 5242880) { 
    echo "ERROR: Your file was larger than 5 Megabytes in size.";
    unlink($fileTmpLoc); 
    exit();
} else if (!preg_match("/.(gif|jpg|png)$/i", $fileName) ) {
         
     echo "ERROR: Your image was not .gif, .jpg, or .png.";
     unlink($fileTmpLoc); 
     exit();
} else if ($fileErrorMsg == 1) { 
    echo "ERROR: An error occured while processing the file. Try again.";
    exit();
}

$moveResult = move_uploaded_file($fileTmpLoc, "uploads/$fileName");

if ($moveResult != true) {
    echo "ERROR: File not uploaded. Try again.";
    unlink($fileTmpLoc); 
    exit();
}
unlink($fileTmpLoc); 

header('Location: index1.php'); 

?>

