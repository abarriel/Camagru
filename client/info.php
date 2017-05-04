<?php
session_start();
if (!$_SESSION['loggued_on_user'])
	header("Location: ../index.php");
include('../config/connect_db.php');
include('../config/user.php');

echo $_SESSION['loggued_on_user'];
echo "<br/>";
$user = New user(array("login" => $_SESSION['loggued_on_user']));
$data = $user->getAllInfo();
// print_r($data);
if ($data['picture'] == 0)
	return ;
echo $data['picture']. " publications ";
echo $data['likes']. " likes";
echo "<br/><br/>";
?>