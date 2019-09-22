<?php

session_start();
if(!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
header("Location: login.php");
exit;
}
?>

<?php 

//connect to the server
$connection = mysqli_connect('localhost', 'root', '');

//check the server connection status
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}

//connect to the database
$select_db = mysqli_select_db($connection, 'community');

//check the database connection status
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Community management system</title>
<link rel="stylesheet" type="text/css" href="../css/sty.css" /><!--link to css style sheet-->
</head>

<body>
<div id="header"></div>
<div id="cont">
<ul id="fir_lin">
<li><a href="donator_view.php">Donator request</a></li>
<li><a href="community_view.php">Community request</a></li>
<li><a href="donation_view.php">view donations</a></li>
<li>


<P>User type: <strong>Admin</strong></P>
<P>Messages: <strong ><a href="message_view.php" style="color: red">View</a></strong></P>
<P>Date: <strong><?php echo date("Y/m/d");?></strong></P>
</li>
<li><a href="community_view_all.php">View community</a></li>
<li><a href="donator_view_all.php">View donator</a></li>
<li><a href="reset_pass.php">Reset password</a></li>
<li><a href="Session_destroy.php">Logout</a></li>
</ul>



</div>
</body>
</html>
