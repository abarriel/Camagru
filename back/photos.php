<?php
session_start();
include("../config/user.php");
include("../back/error_account.php");
include('../config/account.php');
if($_POST['action'] === "allPublic")
{
	$fetch = new user(array());
	$val = $fetch->getCollage();
	echo json_encode($val);
	return;
}

if (!$_SESSION['loggued_on_user'])
{
	header("Location: ../index.php");
	exit();
}

if ($_POST['action'] === "all" && $_SESSION['loggued_on_user'])
{
	$fetch = new user(array());
	$val = $fetch->getCollage();
	echo json_encode($val);
}
if ($_POST['action'] === "myself" && $_SESSION['loggued_on_user'])
{
	$fetch = new user(array());
	$val = $fetch->getCollageUser($_SESSION['loggued_on_user']);
	echo json_encode($val);
}
else if ($_POST['action'] === "deletePicture" && $_POST['key'] && $_SESSION['loggued_on_user'])
{
	$fetch = new user(array("picture"=>$_POST['key']));
	$val = $fetch->deletePicture();
	if (file_exists("../data/image/".$_POST['key'].".png"))
		unlink("../data/image/".$_POST['key'].".png");
}

?>
