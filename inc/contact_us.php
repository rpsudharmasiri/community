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

//If the form is submitted
if (isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['msg'];


//insert values to the database
$query = "INSERT INTO `message`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";
//Execute query
$reu=mysqli_query($connection, $query);


if($reu==1){
	echo '<script language="javascript">';
echo 'alert("Message sent successfull..")';
echo '</script>'; 
}else{
	echo '<script language="javascript">';
echo 'alert("Not Inserted..")';
echo '</script>'; 
}}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact us</title>
<link rel="stylesheet" type="text/css" href="../css/sty.css" /><!--link to css style sheet-->
</head>

<body>
	<?php
require_once('nav_bar.php');
?>

<div id="slider_contact">
</div>
<div id="contact_content">
	<table width="80%;">
		<form method="POST">
		<tr>
			<td><h2>Leave Us a Message<h2></td>
		</tr>
		<tr>
			<td><input type="text" name="name" placeholder="Name...."></td>
		</tr>
		<tr>
			<td><input type="text" name="email" placeholder="Email...."></td>
		</tr>
		<tr>
			<td><textarea name="msg" placeholder="Message...." id="txt_area"></textarea></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="Send" id="snd_btn"></td>
		</tr>
		</form>
	</table>
</div>


<div id="footer">© 2019 umesha samudini</div>
</body>
</html>
