<?php
session_start();
if (!$_SESSION['loggued_on_user'])
{
	header("Location: ../index.php");
	exit();
}
// include("header.php");
include('../config/account.php');
include("../config/user.php");
include("../back/error_account.php");
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
if ($_POST['action'] === "deletePicture" && $_POST['key'] && $_SESSION['loggued_on_user'])
{
	$fetch = new user(array("picture"=>$_POST['key']));
	$val = $fetch->deletePicture();
	echo "reussi";

}

?>
