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

$db->query("DELETE FROM activities WHERE id='$id' ");

	if(is_file("../activities/".$id."_1.jpg")){
		unlink("../activities/".$id."_1.jpg");
	}
	
	if(is_file("../activities/".$id."_2.jpg")){
		unlink("../activities/".$id."_2.jpg");
	}  
	
	if(is_file("../activities/".$id."_3.jpg")){
		unlink("../activities/".$id."_3.jpg");
	} 
	
	if(is_file("../activities/".$id."_4.jpg")){
		unlink("../activities/".$id."_4.jpg");
	} 



header("Location: activities.php");

?>
