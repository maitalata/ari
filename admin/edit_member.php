<?php
session_start();
include("../includes/connect.inc.php");
$page = "settings";

if(!isset($_SESSION['admin_logged'])){
	header("Location: login.php");
}

if(!isset($_GET['id'])){
	header("Location: members.php");
}
$id = $_GET['id'];

$user = $_SESSION['user'];

$fullname= $position= $bio= $response= "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $validator = new DataValidation();

  $fullname = $validator->validate($_POST['fullname']);
  $position = $validator->validate($_POST['position']);
  $bio = $validator->validate($_POST['bio']);
  
  if($validator->emptyCheck($fullname, $position, $bio)){
	  if($db->query("UPDATE members SET name='$fullname', position='$position', bio='$bio' WHERE id='$id'")){
		  if(is_uploaded_file($_FILES['picture']['tmp_name'])){
				$filename = $id.".jpg";
				move_uploaded_file($_FILES['picture']['tmp_name'],"../members/".$filename);
			}
		  $response = "<div class=\"w3-panel w3-green w3-leftbar \">
						<h6><i class=\"fa fa-check w3-green w3-margin-right\"></i> Member profile updated successfully</h6>
						</div>";
	  }else{
		  $response = "<div class=\"w3-panel w3-red w3-leftbar \">
						<h6><i class=\"fa fa-times w3-deep-orange w3-margin-right\"></i> Error! System cannot update profile</h6>
						</div>";
	  }
  }else{
	  $response = "<div class=\"w3-panel w3-red w3-leftbar \">
						<h6><i class=\"fa fa-times w3-deep-orange w3-margin-right\"></i> All fields must be filled</h6>
						</div>";
  }
}

$query = $db->query("SELECT * FROM  members WHERE id='$id'");
$row = $query->fetch_array();


?>
<!DOCTYPE html>
<html>
<title>Adversity Relief Initiative | Administrator Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/w3-theme-blue-grey.css">
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
    <h3><b><i class="fa fa-edit"></i> Edit Member Profile</b></h3>
  </header>
	<form action="" enctype="multipart/form-data" method="POST">
	<div class="w3-panel">
		<?php echo $response; ?>
		  <label>Name</label>
		  <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Members's Fullname" name="fullname" value="<?php echo $row['name']; ?>"  required >
		  <label>Position</label>
		  <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Member's Position" name="position" value="<?php echo $row['position']; ?>" required >
		  <label>Picture</label>
		  <input class="w3-input w3-border w3-margin-bottom" type="file" name="picture" >
		  <label>Bio</label>
		  <textarea class="w3-input w3-border w3-margin-bottom" placeholder="Member's brief bio" name="bio" rows="4" required ><?php echo $row['bio']; ?></textarea>
		  <div class="w3-section"> 
			<button type="submit" class="w3-button w3-left w3-theme-d3" title="Sign Up">Update</button>
		  </div>
    </div>
	</form>


 </div>

<?php include("../includes/admin_footer.inc.php"); ?>
</body>
</html>
