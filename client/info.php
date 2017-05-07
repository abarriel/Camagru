<?php
session_start();
if (!$_SESSION['loggued_on_user'])
	header("Location: ../index.php");
include('../config/database.php');
include('../config/user.php');

echo $_SESSION['loggued_on_user'];
echo "<br/>";
$user = New user(array("login" => $_SESSION['loggued_on_user']));
$data = $user->getAllInfo();
if ($data['picture'] == 0)
	return ;
echo $data['picture']. " publications ";
echo $data['likes']. " likes";
echo "<br/><br/>";
?>