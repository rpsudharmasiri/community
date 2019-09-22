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
$dname = $_POST['dname'];
$cname = $_POST['cname'];
$acc_no = $_POST['acc_no'];
$date = $_POST['date'];
$amou = $_POST['amou'];

//insert values to the database
$query = "INSERT INTO `donate`( `dname`, `cname`, `acc_num`, `date`, `amount`) VALUES ('$dname','$cname ','$acc_no','$date','$amou')";

//Execute query
$reu=mysqli_query($connection, $query);


if($reu==1){
	echo '<script language="javascript">';
echo 'alert("Thank you for your donation..")';
echo '</script>'; 
}else{
	echo '<script language="javascript">';
echo 'alert(Error..")';
echo '</script>'; 
}}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Make a donation</title>
<link rel="stylesheet" type="text/css" href="../css/sty.css" /><!--link to css style sheet-->
</head>

<body>
	<?php
require_once('nav_bar.php');
?>


<?php 
$RID=$_REQUEST['RID'];
$query = "SELECT * from community where id = '$RID'";
    $result = mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($result))
    {

?>
<div id="slider_contact_donate">
</div>
<div id="contact_content">
	<form method="post">
	<table width="80%;">
		<tr>
			<td><h2>Donate<h2></td>
			<tr>
		<td>Donator name</td>
		<td>:</td>
		<td width="400px"><input type="text" name="dname" placeholder="Enter your name.."  required="required"></td>
	</tr>

	<tr>
		<td>Community name</td>
		<td>:</td>
		<td width="400px"><input type="text" name="cname" value="<?php echo $row['name']; ?>" required="required"></td>
	</tr>


<tr>
		<td>Account number</td>
		<td>:</td>
		<td width="400px"><input type="text" name="acc_no" value="<?php echo $row['acc_num']; ?>" required="required"></td>
	</tr>

	<tr>
		<td>Donation date</td>
		<td>:</td>
		<td width="400px"><input type="date" name="date"  required="required"></td>
	</tr>

	<tr>
		<td>Amount</td>
		<td>:</td>
		<td width="400px"><input type="text" name="amou" placeholder="Type Amount.." required="required"></td>
	</tr>

		<tr>
		<td colspan="3">
			<input type="submit" name="submit" value="Donate" id="btn_sub">
		<?php }?>	<input type="reset" name="submit" value="Clear" id="btn_sub">

		</td>
	</tr>
	</table>
</form>
</div>


<div id="footer">© 2019 umesha samudini</div>
</body>
</html>
