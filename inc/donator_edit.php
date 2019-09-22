	<?php
require_once('nav_bar.php');
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
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$ema = $_POST['ema'];
$contact_no = $_POST['contact_no'];
$Password = $_POST['Password'];

//insert values to the database
$unmae=$_SESSION["username_wb"];
$query = "UPDATE `donator` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`email`='$ema',`contact_no`='$contact_no',`pass`='$Password' WHERE `id`='$unmae'";


//Execute query
$reu=mysqli_query($connection, $query);


if($reu==1){
	echo '<script language="javascript">';
echo 'alert("Updated..")';
echo '</script>'; 
}else{
	echo '<script language="javascript">';
echo 'alert("Not updated..")';
echo '</script>'; 
}}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donator Profile update</title>
<link rel="stylesheet" type="text/css" href="../css/sty.css" /><!--link to css style sheet-->
</head>

<body>


<?php
$query = "SELECT * from donator where id = '$unmae'";
    $result = mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($result))
    {

?>
<div id="slider_contact_dona">
</div>
<div id="contact_content">
	<form method="post">
<table>
	<tr align="center"><h2 align="center">Donator registration</h2></tr>
	<tr>
		<td>First name</td>
		<td>:</td>
		<td width="400px"><input type="text" name="fname" placeholder="Type something.." required="required" value="<?php echo $row['fname']; ?>"></td>
	</tr>

		<tr>
		<td>Middle Name</td>
		<td>:</td>
		<td width="400px"><input type="text" name="mname" placeholder="Type something.." required="required" value="<?php echo $row['mname']; ?>"></td>
	</tr>

		<tr>
		<td>Last name</td>
		<td>:</td>
		<td width="400px"><input type="text" name="lname" placeholder="Type something.." required="required" value="<?php echo $row['lname']; ?>"></td>
	</tr>


		<tr>
		<td>Email</td>
		<td>:</td>
		<td width="400px"><input type="text" name="ema" placeholder="Type something.." required="required" value="<?php echo $row['email']; ?>"></td>
	</tr>

		<tr>
		<td>contact no</td>
		<td>:</td>
		<td width="400px"><input type="text" name="contact_no" placeholder="Type something.." required="required" value="<?php echo $row['contact_no']; ?>"></td>
	</tr>

	<tr>
		<td>Password</td>
		<td>:</td>
		<td width="400px"><input type="text" name="Password" placeholder="Type something.." required="required" value="<?php echo $row['pass']; ?>"></td>
	</tr>
	<tr>
		<td colspan="3">
			<input type="submit" name="submit" value="Edit" id="btn_sub">
			<input type="reset" name="submit" value="Clear" id="btn_sub">

		</td>
	<?php } ?>
	</tr>
</table>
</form>
</div>


<div id="footer">© 2019 umesha samudini</div>
</body>
</html>
