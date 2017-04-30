<?php
session_start();
if (!$_SESSION['loggued_on_user'])
	header("Location: ../index.php");
// include("header.php");
include('../config/account.php');
include("../config/user.php");
include("../back/error_account.php");

$fetch = new user(array());
$val = $fetch->getCollage();
// if($val)
// $val = unserialize($val);
echo json_encode($val);
// echo "Wrong";

?>
