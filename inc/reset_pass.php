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

//If the form is submitted
if (isset($_POST['submit'])){

//Assigning posted values to variables.
$password = $_POST['old_pass'];
$password2 = $_POST['new_pass'];
$password3 = $_POST['conf_pass'];

//Checking the values are existing in the database or not
$query = "SELECT * FROM `login_credential` WHERE passcode='$password' and id='1'";
 

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

//If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1 && $password2==$password3){

$sql1="UPDATE `login_credential` SET `passcode`='$password3'  WHERE  `passcode`='$password' AND id='1'";
$reu=mysqli_query($connection, $sql1);

if($reu==1){
	echo '<script language="javascript">';
echo 'alert("Updated..")';
echo '</script>'; 
}else{
	echo '<script language="javascript">';
echo 'alert("Not Updated..")';
echo '</script>'; 
}

}
else{
// Show the error message
echo '<script language="javascript">';
echo 'alert("Invalid old password..!!")';
echo '</script>'; 

}}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Reset password</title>
<meta name="generator" content="TSW WebCoder">
<link rel="stylesheet" type="text/css" href="../css/sty.css">
</head>

<body>
<div id="head_space">
	<a href="sys.php"><img src="../img/nomad-community-logo.png" width="150px" height="150px"></a>
	<h2 id="sys_nm">Community management</h2>
</div>
<form name="reset_password" method="post">
<table>
	<tr>
		<td colspan="3">
			<h3>Reset Password</h3>
			<h4>Create a new password for your account using this form below,</h4>
		</td>
	</tr>

		<tr>
		<td>Old password</td>
		<td>:</td>
		<td><input type="text" name="old_pass" required="required"></td>
	</tr>

	<tr>
		<td>New password</td>
		<td>:</td>
		<td><input type="password" name="new_pass" required="required"></td>
	</tr>

	<tr>
		<td>Confirm password</td>
		<td>:</td>
		<td><input type="password" name="conf_pass" required="required"></td>
	</tr>

	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" name="submit" value="Reset" id="btn_reset">
			<input type="Reset" name="Reset" value="clear" id="btn_reset">
		</td>
	</tr>
</form>

</table>
</body>
</html>