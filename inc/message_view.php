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
	<title>View Donations</title>
<meta name="generator" content="TSW WebCoder">
<link rel="stylesheet" type="text/css" href="../css/sty.css">
</head>

<body>
<div id="head_space">
	<a href="sys.php"><img src="../img/nomad-community-logo.png" width="150px" height="150px"></a>
	<h2 id="sys_nm">Community management</h2>

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
</div>
<h2 align="center">Message View</h2>
	<table id="donator">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Email..">
  <tr>
  	<th>Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>Action</th>
  </tr>
  <?php 
	$sql = "SELECT * from message";
	$result = $connection->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  ?>
  <tr>
    <td><?php echo $row["name"] ?></td>
    <td><?php echo $row["email"] ?></td>
    <td><?php echo $row["message"] ?></td>
    <td align="center"><a href="message_delete.php?Rid=<?php echo $row["id"] ?>" onclick="return confirm('Do you want to delete this message..')">Delete</a></td>
  </tr>
<?php } } ?>

</table>
</body>
</html>