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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Communities</title>
<link rel="stylesheet" type="text/css" href="../css/sty.css" /><!--link to css style sheet-->
</head>

<body>
<?php
require_once('nav_bar.php');
?>

<div id="slider_community">
</div>
<div id="community_content">
	<h2>Find a community</h2>

	<table id="donator">
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
    td = tr[i].getElementsByTagName("td")[2];
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
  <tr>
  	<th>ID</th>
    <th>Goverment reg no</th>
    <th>Name</th>
    <th>Category</th>
    <th>Adress</th>
    <th>Email</th>
    <th>Contact No</th>
    <th>Action</th>

  </tr>
  <?php 
	$sql = "SELECT * from community where  status='accepted'";
	$result = $connection->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  ?>
  <tr>
    <td><?php echo $row["id"] ?></td>
    <td><?php echo $row["gov_reg_no"] ?></td>
    <td><?php echo $row["name"] ?></td>
    <td><?php echo $row["category"] ?></td>
    <td><?php echo $row["adress"] ?></td>
    <td><?php echo $row["email"] ?></td>
    <td><?php echo $row["contact_no"] ?></td>
    <td align="center"><a href="donate.php?RID=<?php echo $row["id"] ?>">Donate</a></td>
  </tr>
<?php } } ?>

</table>

</div>


<div id="footer">© 2019 umesha samudini</div>
</body>
</html>
