<?php
session_start();
include("../includes/connect.inc.php");
$page = "settings";

if(!isset($_SESSION['admin_logged'])){
	header("Location: login.php");
}

$user = $_SESSION['user'];

$title= $description= $response= "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $validator = new DataValidation();

  $title = $validator->validate($_POST['title']);
  $description = $validator->validate($_POST['description']);
  
  if($validator->emptyCheck($title, $description)){
	if($db->query("INSERT INTO activities(title, description) VALUES ('$title','$description')")){
		$response = "<div class=\"w3-panel w3-green w3-leftbar \">
						<h6><i class=\"fa fa-check w3-green w3-margin-right\"></i> Activity added successfully</h6>
						</div>";
		if(is_uploaded_file($_FILES['picture1']['tmp_name'])){
			$id = $db->query("SELECT * FROM activities ORDER BY id DESC LIMIT 0, 1")->fetch_array()['id'];
			$filename = $id."_1.jpg";
			move_uploaded_file($_FILES['picture1']['tmp_name'],"../activities/".$filename);
		}
		if(is_uploaded_file($_FILES['picture2']['tmp_name'])){
			$id = $db->query("SELECT * FROM activities ORDER BY id DESC LIMIT 0, 1")->fetch_array()['id'];
			$filename = $id."_2.jpg";
			move_uploaded_file($_FILES['picture2']['tmp_name'],"../activities/".$filename);
		}
		if(is_uploaded_file($_FILES['picture3']['tmp_name'])){
			$id = $db->query("SELECT * FROM activities ORDER BY id DESC LIMIT 0, 1")->fetch_array()['id'];
			$filename = $id."_3.jpg";
			move_uploaded_file($_FILES['picture3']['tmp_name'],"../activities/".$filename);
		}
		if(is_uploaded_file($_FILES['picture4']['tmp_name'])){
			$id = $db->query("SELECT * FROM activities ORDER BY id DESC LIMIT 0, 1")->fetch_array()['id'];
			$filename = $id."_4.jpg";
			move_uploaded_file($_FILES['picture4']['tmp_name'],"../activities/".$filename);
		}					
	}else{
		$response = "<div class=\"w3-panel w3-red w3-leftbar \">
						<h6><i class=\"fa fa-times w3-deep-orange w3-margin-right\"></i> System unable to add activity</h6>
						</div>";
	}

  }else{
	  $response = "<div class=\"w3-panel w3-red w3-leftbar \">
					<h6><i class=\"fa fa-times w3-deep-orange w3-margin-right\"></i> All fields must be filled</h6>
					</div>";
  }
}
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
    <h3><b><i class="fa fa-plus"></i> Add Activity</b></h3>
  </header>
	<form action="" enctype="multipart/form-data" method="POST">
	<div class="w3-panel">
		<?php echo $response; ?>
		  <label>Activity Title</label>
		  <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Activity Title" name="title" required >
		  <label>Picture 1</label>
		  <input class="w3-input w3-border w3-margin-bottom" type="file" name="picture1" required >
		  <label>Picture 2</label>
		  <input class="w3-input w3-border w3-margin-bottom" type="file" name="picture2" required >
		  <label>Picture 3</label>
		  <input class="w3-input w3-border w3-margin-bottom" type="file" name="picture3"  >
		  <label>Picture 4</label>
		  <input class="w3-input w3-border w3-margin-bottom" type="file" name="picture4"  >
		  <label>Activity Description</label>
		  <textarea class="w3-input w3-border w3-margin-bottom" placeholder="Description of activity" name="description" rows="4" required ></textarea>
		  <div class="w3-section"> 
			<button type="submit" class="w3-button w3-left w3-theme-d3" title="Add Activity">Add Activity</button>
		  </div>
    </div>
	</form>


 </div>

<?php include("../includes/admin_footer.inc.php"); ?>
</body>
</html>
