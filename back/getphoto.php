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
	// $data = $user->addComment($_SESSION['loggued_on_user']);	
	// $data = new stdClass();
	// $data->usr = "allan";
	// $data->comment = "commentaire_de_allan";
	// $data = json_encode($data);
	// $data = json_decode($data);
	// $dta = new stdClass();
	// $dta->usr = "alla1n";
	// $dta->comment = "commentaire_de_allan";
	// $data->$dta->usr;
	// $data
	$data = array('usr' => "allan", 'comment' => "commentaire_de_allan");
	$data = json_encode($data);
	$data = json_decode($data);
	echo $data;
	// echo json_encode($data);
	// $new = array_combine($user, $comment);	
	// return $data;
}
?>