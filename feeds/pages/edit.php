<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	//$name=$_POST['name'];
	$status=$_POST['status'];
	$image=$_POST['image'];	
	//$profilePic=$_POST['profilePic'];	
	//$timeStamp=$_POST['timeStamp'];	
	$url=$_POST['url'];	
	
	// checking empty fields
	if(empty($status)) {	

		
		if(empty($status)) {
			echo "<font color='red'>Status field is empty.</font><br/>";
		}
		
		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE updates SET status='$status',image='$image',url='$url' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM updates WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$status = $res['status'];
	$image = $res['image'];
	$profilePic = $res['profilePic'];
	$timeStamp = $res['timeStamp'];
	$url = $res['url'];
}
?>
<html>
<head>	
	<title>Edit Stylus Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Status Update</td>
				<td><textarea name="status" rows="10" cols="50"> <?php echo $status;?> </textarea></td>
			</tr>
			<tr> 
				<td>Poster Image</td>
				<td><input type="text" name="image" value=<?php echo $image;?>></td>
			</tr>
			<tr> 
				<td>URL</td>
				<td><input type="text" name="url" value=<?php echo $url;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
