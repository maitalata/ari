<?php
session_start();
include("../includes/connect.inc.php");
$page = "settings";

if(!isset($_SESSION['admin_logged'])){
	header("Location: login.php");
}

$user = $_SESSION['user'];

$query = $db->query("SELECT * FROM activities");
?>
<!DOCTYPE html>
<html>
<title>Adversity Relief Initiative</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/w3-theme-blue-grey.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link rel="icon" type="image/x-icon" href="../images/logo.png" />
 <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
    <h3><b><i class="fa fa-users"></i> ARI Activites</b></h3>
  </header>

	<div class="w3-panel">
		 <div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
               <thead>
                  <tr>                                       
                     <th>Images</th>
					 <th>Title</th>
                     <th>Description</th>
                     <th>View</th>
                     <th>Edit</th>
                     <th>Delete</th>
                  </tr>
				</thead>
				<tbody>
					<?php 
						while($row = $query->fetch_array()){
                $arr = str_split($row['description'], 150);
								echo "<tr>
                  <td>
				  ".(is_file("../activities/".$row['id']."_1.jpg")?"<img src='../activities/".$row['id']."_1.jpg' style='width:80px;height:60px;' >":"")." <br><br>
				  ".(is_file("../activities/".$row['id']."_2.jpg")?"<img src='../activities/".$row['id']."_2.jpg' style='width:80px;height:60px;' >":"")."	<br><br>
				  
				  ".(is_file("../activities/".$row['id']."_3.jpg")?"<img src='../activities/".$row['id']."_3.jpg' style='width:80px;height:60px;' >":"")." <br><br>
				  ".(is_file("../activities/".$row['id']."_4.jpg")?"<img src='../activities/".$row['id']."_4.jpg' style='width:80px;height:60px;' >":"")."
				  
				  </td>
									<td>".$row['title']."</td>
									<td>".$arr[0]."</td>
                  <td><a href='view_activity.php?id=".$row['id']."'><i class='fa fa-eye'></i></a></td>
                  <td><a href='edit_activity.php?id=".$row['id']."'><i class='fa fa-edit'></i></a></td>
                  <td><a href='delete_activity.php?id=".$row['id']."' onclick=\"return confirm('Are you sure you want to delete this member?')\"  ><i class='fa fa-times'></i></a></td>
									</tr>";
							}
					?>
                </tbody>
			</table>
          </div>
    </div>


 </div>
	<!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
   <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>

<?php include("../includes/admin_footer.inc.php"); ?>
</body>
</html>
