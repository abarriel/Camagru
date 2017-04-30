<?php
include('../config/account.php');
if(!$_SESSION['loggued_on_user'])
	header("Location: ../index.php");
session_start();
if ($_POST['submit'] === 'Enjoy!')
{
	$user = New account(array());
	if (isset($_POST['email']))
	{
		if (!($user->changeMail($_POST['email'],$_SESSION['loggued_on_user'])))
			$_SESSION['alert'] = "The change was succesful";
		else
			$_SESSION['alert'] = "Email is already taken";
	}
	else if (isset($_POST['old_passwd']) && isset($_POST['new_passwd']))
	{
		if (!($user->changePassword($_POST['old_passwd'],$_POST['new_passwd'],$_SESSION['loggued_on_user'])))
			$_SESSION['alert'] = "The change was succesful";
		else
			$_SESSION['alert'] = "Wrong Password";
		$user->sendMail();
	}
	else if (isset($_POST['delete']) && $_POST['delete'] === "1")
	{
		$user->deleteAccount($_SESSION['loggued_on_user']);
		header("Location: ../client/logout.php");
	}
}
?>
