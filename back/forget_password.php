<?php
session_start();
include('../config/account.php');
if ($_SESSION['loggued_on_user'])
	header("Location: ../index.php");
if ($_POST['forget'] === "1" && isset($_POST['login']))
{
	$user = New Account(array());
	$var = $user->newPassword($_POST['login']);
	if ($var === 1)
		$_SESSION['alert'] = "Account not found on our database";
	if ($var === 2)
		$_SESSION['alert'] = "Please confirmed your acccount first";
	if ($var === 0)
		$_SESSION['alert'] = "Thanks! Please your mailbox";
}

?>