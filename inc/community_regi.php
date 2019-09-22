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
$id = $_POST['id'];
$reg_no = $_POST['reg_no'];
$name = $_POST['name'];
$cat = $_POST['cat'];
$addr = $_POST['addr'];
$ema = $_POST['ema'];
$contact_no = $_POST['contact_no'];
$acc_num = $_POST['acc_num'];
$pass = $_POST['pass'];

//insert values to the database
$query = "INSERT INTO `community`(`id`,`gov_reg_no`, `name`, `category`, `adress`, `email`, `contact_no`,`status`,`acc_num`,`pass`) VALUES ('$id','$reg_no','$name','$cat','$addr','$ema','$contact_no','pending',$acc_num,$pass)";

//Execute query
$reu=mysqli_query($connection, $query);


if($reu==1){
	echo '<script language="javascript">';
echo 'alert("Inserted..")';
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
<title>Community registration</title>
<link rel="stylesheet" type="text/css" href="../css/sty.css" /><!--link to css style sheet-->
<script src="../jscr/validation.js" type="text/javascript"></script><!--link to js file-->
</head>

<body>
	<?php
require_once('nav_bar.php');
?>

<div id="slider_contact_dona">
</div>
<div id="contact_content">
	<form method="post" name="community" onsubmit="return validateForm();">
<table>
	<tr align="center"><h2 align="center">Community registration</h2></tr>

	<?php
$query = "SELECT MAX(id) As max FROM community";
    $result = mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($result);
    	 $maxnum=$row['max']+1;
?>

	<tr>
		<td>Community ID</td>
		<td>:</td>
		<td width="400px"><input type="text" name="id" value="<?php echo $maxnum ?>" readonly></td>
	</tr>

	<tr>
		<td>Government Registration number</td>
		<td>:</td>
		<td width="400px"><input type="text" name="reg_no" placeholder="Type something.." required="required"></td>
	</tr>

		<tr>
		<td>Name</td>
		<td>:</td>
		<td width="400px"><input type="text" name="name" placeholder="Type something.." required="required"></td>
	</tr>

		<tr>
		<td>category</td>
		<td>:</td>
		<td width="400px"><input type="text" name="cat" placeholder="Type something.." required="required"></td>
	</tr>

		<tr>
		<td>Adress</td>
		<td>:</td>
		<td width="400px"><input type="text" name="addr" placeholder="Type something.." required="required"></td>
	</tr>

	<tr>
		<td>Account number</td>
		<td>:</td>
		<td width="400px"><input type="text" name="acc_num" placeholder="Type something.." required="required"></td>
	</tr>

		<tr>
		<td>Email</td>
		<td>:</td>
		<td width="400px"><input type="text" name="ema" placeholder="Type something.." required="required" id="ema"></td>
	</tr>

		<tr>
		<td>contact no</td>
		<td>:</td>
		<td width="400px"><input type="text" name="contact_no" placeholder="Type something.." required="required" maxlength="10" onkeypress="validate(event)"></td>
	</tr>

		<tr>
		<td>Password</td>
		<td>:</td>
		<td width="400px"><input type="text" name="pass" placeholder="Type something.." required="required" ></td>
	</tr>
	<tr>
		<td colspan="3">
			<input type="submit" name="submit" value="Register" id="btn_sub" onclick='Javascript:checkEmail();'>
			<input type="reset" name="submit" value="Clear" id="btn_sub">

		</td>
	</tr>
</table>
</form>
</div>

<div id="footer">© 2019 umesha samudini</div>
</body>
</html>
