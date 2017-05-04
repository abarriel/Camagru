<?php
session_start();
if (!$_SESSION['loggued_on_user'])
	header("Location: ../index.php");
// include("header.php");
include('../config/account.php');
include("../config/user.php");
include("../back/error_account.php");
$fetch = new user(array());
if($_POST['action'] === "all")
{
	$val = $fetch->getCollage();
	echo json_encode($val);
}
else
{
	$val = $fetch->getCollageUser($_SESSION['loggued_on_user']);
	echo json_encode($val);
}
?>
