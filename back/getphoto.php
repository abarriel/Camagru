<?php
session_start();
include("../back/error_account.php");
include('../config/account.php');
include('../config/user.php');
if(!$_SESSION['loggued_on_user'])
	header("Location: ../index.php");
if($_POST['action'] === "all" && $_POST['ref'])
{
	$user = new user(array("picture" => $_POST['ref']));
	if ($val = $user->ifPicture())
	{
		echo "Error";
		exit();
	}
	$data = $user->RecupAllInfo();
	echo json_encode($data);
}
?>