<?php
session_start();
 ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../css/sty.css" />
</head>
<body>
	<?php if(!empty($_SESSION["username_wb"])){
		$unmae=$_SESSION["username_wb"];
		$type=$_SESSION['type'];

		?>
	<?php if($type=='Community'){

	?>
<div id="header_main"><h4><img src="../img/user_white_1048260.png" width="20px" height="20px" id="pro_img">&nbsp;<?php echo $unmae ?> &nbsp;  | <a href="Session_destroy_web.php">Logout</a></h4><h3><a href="community_edit.php">Edit profile </a>|<a href="view_profile.php?Rid=<?php echo $unmae;?>" target="_blank"> View profile</a></h3></div>

	<?php } elseif ($type=='Donator') {?>
		<div id="header_main"><h4><img src="../img/user_white_1048260.png" width="20px" height="20px" id="pro_img">&nbsp;<?php echo $unmae ?> &nbsp;  | <a href="Session_destroy_web.php">Logout</a></h4><h3><a href="donator_edit.php">Edit profile</a> </h3></div>
	




<?php }} else{ ?>

	<div id="header_main"><h4><a href="login_web.php">Login </a>|<a href="Donator_regi.php"> Register</a></h4><h3>Call us: 077 0879 043 </h3></div>
	<?php } ?>

<div id="nav">
<ul>
<a href="#"><li><img src="../img/nomad-community-logo.png" width="70px" height="70px" /></li></a>
<a href="View_community_webpage.php"><li>Community</li></a>
<a href="contact_us.php"><li>Contact Us</li></a>
<a href="Reg_nav.php"><li>Registration</li></a>
<a href="index.php"><li>Home</li></a>
</ul>
</div>

</body>
</html>