<?php
session_start();
include("../includes/connect.inc.php");
$page = "messages";

if(!isset($_SESSION['admin_logged'])){
	header("Location: login.php");
}

$user = $_SESSION['user'];


$pageSize = 9;

if(isset($_GET['recordstart']))
{
	$recordStart = (int)$_GET['recordstart'];
}
else
{
	$recordStart = 0;
}

function pagination($recordStart, $pageSize, $totalRow)
{
	if($recordStart > 0)
	{
		$prev = $recordStart - $pageSize;
		echo "<a href='messages.php?recordstart=$prev' class='w3-margin' >Previous Page</a>";
	}
	
	if ($totalRow > ($recordStart + $pageSize))
	{
		$next = $recordStart + $pageSize;
		echo " <a href='messages.php?recordstart=$next' class='w3-margin w3-right'>Next Page</a>";
	}
}

?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
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
    <h3><b><i class="fa fa-envelope"></i> Messages</b></h3>
  </header>
	
	<?php 
		$queryTest = $db->query("SELECT * FROM messages");
		$totalRow = mysqli_num_rows($queryTest);
		
		
		$query = $db->query("SELECT * FROM messages LIMIT $recordStart, $pageSize");

		if($query->num_rows == 0)
		{
			echo "<div id='bg'>There are no items check back later!</div>";
		}
		else
		{
			while($row = $query->fetch_array()){
				echo "<div class=\"w3-col m4 w3-margin-small w3-padding\">
						  <div class=\"w3-white\">
							<i class='fa fa-user w3-margin' style='font-size:30px;'></i>
							<div class=\"w3-container\">
							  <h4>".$row['name']."</h4>
							  <p class=\"w3-opacity\">".$row['email']."</p>";

							  if(strlen($row['message']) > 75){
							  	$arr = str_split($row['message'], 75);
							  	echo "<p>".$arr[0]."...</p>";
							  }else{
							  	 echo "<p>".$row['message']."</p>"; 
							  }

							  if(strlen($row['message']) <= 42){
							  	 echo "<br>";
							  }
							 
							   echo "<button class=\"w3-button w3-dark-grey w3-section w3-right w3-margin \" >Delete</button>
							   <button class=\"w3-button w3-dark-grey w3-section w3-right\" >Read</button>
							</div>
						  </div>
						</div>";
			}
		}
		pagination($recordStart, $pageSize, $totalRow);
	?>


 </div>

<?php include("../includes/admin_footer.inc.php"); ?>
</body>
</html>
