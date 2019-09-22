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

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	body{
		margin: 0px;
		padding: 0px;
	}
	#view_header{
		width: 100%;
		height: 100px;
		background-color: #97babf;
		margin-top: -25px;
	}
	#view_header h1{
		line-height: 100px;
		font-size: 35px;
		padding-left: 300px;
		color: white;
	}
	#view_img{
		margin-top: -60px;
		margin-left: 80px;
		border-radius: 50%;
	}
	#view_tbl{
		margin-top: -150px;
		margin-left: 400px;
	}
</style>
<body>
<?php
			//Request Value
$RID=$_REQUEST['Rid'];	
$query = "SELECT * from community where id = '$RID'";
    $result = mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($result))
    {

?>
<div id="view_header"> <h1><?php echo $row['name']; ?></h1></div>
	<img src="../img/768px-Circle-icons-profile.svg.png" width="200px" height="200px" id="view_img">

<table border="0" width="400px" height="500px" id="view_tbl" cellpadding="0" cellspacing="0">

	</tr>
		<tr>
		<td><b>Government Registration no</b></td>
		<td>:</td>
		<td><?php echo $row['gov_reg_no']; ?></td>
	</tr>

			<tr>
		<td ><b>Name</b></td>
		<td>:</td>
		<td><?php echo $row['name']; ?></td>
	</tr>

			<tr>
		<td ><b>Category</b></td>
		<td>:</td>
		<td><?php echo $row['category']; ?></td>
	</tr>

			<tr>
		<td ><b>Adress</b></td>
		<td>:</td>
		<td><?php echo $row['adress']; ?></td>
	</tr>

			<tr>
		<td ><b>Email</b></td>
		<td>:</td>
		<td><?php echo $row['email']; ?></td>
	</tr>

	<tr>
		<td ><b>Contact No</b></td>
		<td>:</td>
		<td><?php echo $row['contact_no']; ?></td>
	</tr>

	<tr>
		<td ><b>Account number</b></td>
		<td>:</td>
		<td><?php echo $row['acc_num']; ?></td>
	</tr>

	<tr>
		<td ><b>Password</b></td>
		<td>:</td>
		<td><?php echo $row['pass']; ?></td>
	</tr>
<?php } ?>
</table>

</body>
</html>