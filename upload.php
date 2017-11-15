<?php
session_start();
?>
<html>
<head><title> Upload page</title></head>
<body>
<h1> Uploading the files</h1>


<form enctype="multipart/form-data" action="submit.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />

<input type="file" name="userfile" />
<input type="submit" value="submit" />
</form>

</body>
</html>
