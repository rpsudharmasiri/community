<?php  

//Start the Session
session_start();

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
$username = $_POST['username'];
$password = $_POST['password'];

//Checking the values are existing in the database or not
$query = "SELECT * FROM `login_credential` WHERE username='$username' and  passcode='$password'";
 
//execute the query
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

$count = mysqli_num_rows($result);

//If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['username'] = $username;
$_SESSION["login"] = "OK";

header("Location: sys.php");

}
else{
// Show the error message
echo '<script language="javascript">';
echo 'alert("Invalid username or password..!!")';
echo '</script>'; 

}}
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
<td><input type="text" name="username" id="txt" placeholder="User name" required="required" /></td>
<tr>

<tr>
<td><input type="password" name="password" id="txt" placeholder="Password" required="required"/></td>
<tr>

<tr>
<td align="center"><input type="submit" id="btn" value="submit" name="submit"></td>
<tr>

</form>
</table>
</div>
</body>
</html>
