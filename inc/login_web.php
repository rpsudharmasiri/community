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
$username_wb = $_POST['username_wb'];
$password_wb = $_POST['password_wb'];
$type=$_POST['type'];

if($type=='Donator'){
//Checking the values are existing in the database or not
$query = "SELECT * FROM `donator` WHERE id='$username_wb' and  pass='$password_wb'";
 
//execute the query
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

$count = mysqli_num_rows($result);

//If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
	//Start the Session
session_start();
$_SESSION['username_wb'] = $username_wb;
$_SESSION['password_wb'] = $password_wb;
$_SESSION['type']=$type;
$_SESSION["login"] = "OK";

header("Location: index.php");

}
else{
// Show the error message
echo '<script language="javascript">';
echo 'alert("Invalid username or password..!!")';
echo '</script>'; 

}}if($type=='Admin'){
//Checking the values are existing in the database or not
$query = "SELECT * FROM `login_credential` WHERE username='$username_wb' and  passcode='$password_wb'";
 
//execute the query
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

$count = mysqli_num_rows($result);

//If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
	//Start the Session
session_start();
$_SESSION['username_wb'] = $username_wb;
$_SESSION['password_wb'] = $password_wb;
$_SESSION['type']=$type;
$_SESSION["login"] = "OK";

header("Location: sys.php");

}
else{
// Show the error message
echo '<script language="javascript">';
echo 'alert("Invalid username or password..!!")';
echo '</script>'; 

}}


elseif ($type=='Community') {
//Checking the values are existing in the database or not
$query = "SELECT * FROM `community` WHERE id='$username_wb' and  pass='$password_wb'";
 
//execute the query
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

$count = mysqli_num_rows($result);

//If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
	//Start the Session
session_start();
$_SESSION['username_wb'] = $username_wb;
$_SESSION['password_wb'] = $password_wb;
$_SESSION['type']=$type;
$_SESSION["login"] = "OK";

header("Location: index.php");

}
else{
// Show the error message
echo '<script language="javascript">';
echo 'alert("Invalid username or password..!!")';
echo '</script>'; 

}}




}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" type="text/css" href="../css/sty.css" /><!--link to css style sheet-->
</head>

<body>
<div id="main_con">
<form method="post" name="login" >
<table id="log_tab" width="280px">
<tr>
<td align="center"><h1 style="color:#066;">Login</h1></td>
</tr>
<tr>
<!-- required used as form validation-->
<td><input type="text" name="username_wb" id="txt" placeholder="User name" required="required" /></td>
<tr>

<tr>
<td><input type="password" name="password_wb" id="txt" placeholder="Password" required="required"/></td>
<tr>

<tr>
<td>
<select name="type" id="type">
  <option value="Donator">Donator</option>
  <option value="Community">Community</option>
  <option value="Admin">Admin</option>
</select>
</td>
</tr>

<tr>
<td align="center"><input type="submit" id="btn" value="submit" name="submit"></td>
<tr>

</form>
</table>
</div>
</body>
</html>
