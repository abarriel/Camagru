<?php
include ('../config/account.php');
session_start();
$new = New account(array("empty" => "empty"));
$res = $new->Activation($_GET['cle'],$_GET['login']);
if ($res === 1)	
	$_SESSION['alert'] = "This account wasn't found on our database";
if ($res === 2)	
	$_SESSION['alert'] = "This account was already register";
if ($res === 3)
	$_SESSION['alert'] = "This is the wrong key, please check again!";
if ($res === 0)	
{
	$_SESSION['alert'] = "Thank You ".$_SESSION['loggued_on_user']." ! You can now enjoy sharing pictures!";
	header("Location: ../client/home.php");
	return ;
}
header("Location: ../index.php");
?>
