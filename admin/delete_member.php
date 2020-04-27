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

$db->query("DELETE FROM members WHERE id='$id' ");
unlink("../members/".$id.".jpg");

header("Location: members.php");

?>
