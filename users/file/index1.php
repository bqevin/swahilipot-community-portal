
<form enctype="multipart/form-data" method="post" action="image_upload_script.php">
<img src=<?php echo "\"".$upload_dir.$userpic."\""; ?>  height='200' with='150'>
<input name="uploaded_file" type="file"/><br /><br />
<input type="submit" value="Upload It"/>
</form>