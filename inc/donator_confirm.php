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

//Request Value
$RID=$_REQUEST['RID'];	
//Query
$sql="UPDATE `donator` SET `status`='accepted' WHERE `id`='$RID'";


if ($connection->query($sql) === TRUE) {
    header('location:donator_view.php?accept');
} else {
    echo "Error deleting record: " . $connection->error;
}



?>