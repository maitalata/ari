<?php
session_start();
require("../includes/connect.inc.php");

$page = "home";

if(!isset($_SESSION['admin_logged'])){
	header("Location: login.php");
}

if(!isset($_GET['id'])){
	header("Location: members.php");
}
$id = $_GET['id'];

$user = $_SESSION['user'];

$query = $db->query("SELECT * FROM activities WHERE id='$id'");
$row = $query->fetch_array();

?>
<!DOCTYPE html>
<html>
<title>Adversity Relief Initiative | Administrator Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/x-icon" href="../images/logo.png" />
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<?php include("../includes/admin_header.inc.php"); ?>

<?php include("../includes/admin_side_bar.inc.php"); ?>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-heartbeat"></i> <?php echo $row['title']; ?></b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
	<?php if(is_file("../activities/".$row['id']."_1.jpg")){ ?>
		<img src="<?php echo "../activities/".$id."_1.jpg"; ?>" style="width:300px;" class="w3-margin" >
	<?php } ?>
	
	<?php if(is_file("../activities/".$row['id']."_2.jpg")){ ?>
		<img src="<?php echo "../activities/".$id."_2.jpg"; ?>" style="width:300px;" class="w3-margin" >
	<?php } ?>
	
	<?php if(is_file("../activities/".$row['id']."_3.jpg")){ ?>
		<img src="<?php echo "../activities/".$id."_3.jpg"; ?>" style="width:300px;" class="w3-margin" >
	<?php } ?>
	
	<?php if(is_file("../activities/".$row['id']."_4.jpg")){ ?>
		<img src="<?php echo "../activities/".$id."_4.jpg"; ?>" style="width:300px;" class="w3-margin" >
	<?php } ?>
	
	<p class="w3-justify"><?php echo $row['description']; ?></p>
  </div>
  
  <?php include("../includes/admin_footer.inc.php"); ?>
</body>
</html>
