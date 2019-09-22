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


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>View donator</title>
<meta name="generator" content="TSW WebCoder">
<link rel="stylesheet" type="text/css" href="../css/sty.css">
</head>

<body>
<div id="head_space">
	<a href="sys.php"><img src="../img/nomad-community-logo.png" width="150px" height="150px"></a>
	<h2 id="sys_nm">Community management</h2>
</div>
<h2 align="center">Donator View</h2>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
  <script type="text/javascript">
  // filter table data community
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("donator");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
	<table id="donator">

  <tr>
  	<th>ID</th>
    <th>First name</th>
    <th>Middle name</th>
    <th>Last name</th>
    <th>Email</th>
    <th>Contact No</th>
    <th>Action</th>
  </tr>
  <?php 
	$sql = "SELECT * from donator where `status`='accepted'";
	$result = $connection->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  ?>
  <tr>
    <td><?php echo $row["id"] ?></td>
    <td><?php echo $row["fname"] ?></td>
    <td><?php echo $row["mname"] ?></td>
    <td><?php echo $row["lname"] ?></td>
    <td><?php echo $row["email"] ?></td>
    <td><?php echo $row["contact_no"] ?></td>
    <td align="center"><a href="donator_delete.php?RID=<?php echo $row['id'];?>" onclick="return confirm('Are you sure?')">Delete</td>
  </tr>
<?php } } ?>

</table>
</body>
</html>