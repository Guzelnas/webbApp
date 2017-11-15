<?php
session_start();
echo $_POST['username'];
echo $_POST['email'] . "\n";
$email = $_POST['email'];
echo "Your email is: " . $email . "\n";
$_SESSION['email'] = $_POST['email'];
?>

<html>
<head><title>Hello!</title>
</head>
<body>
<hr />
<a href="gallery.php"> Gallery </a> | <a href="upload.php"> Upload </a>
</body>
</html>
