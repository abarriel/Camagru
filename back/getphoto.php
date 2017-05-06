<?php
session_start();
include("../back/error_account.php");
include('../config/account.php');
include('../config/user.php');
if (!$_SESSION['loggued_on_user'])
	header("Location: ../index.php");
if ($_POST['ref'])
{
	$user = new user(array("picture" => $_POST['ref']));
	if ($val = $user->ifPicture())
	{
		echo "Error";
		exit();
	}
}
else
	return;
if ($_POST['action'] === "all")
{
	$data = $user->RecupAllInfo();
	echo json_encode($data);
}
else if ($_POST['action'] === "addComment" && $_POST['value'])
{
	$token = array('usr' => $_SESSION['loggued_on_user'], 'comment' => $_POST['value']);
	$data = $user->addComment($token);
	$data = $user->getComments();
	echo $_SESSION['loggued_on_user'];
}
?>