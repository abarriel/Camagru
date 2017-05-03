<?
session_start();
$path = "../data/image/";
include('../config/account.php');
include("../config/user.php");
if ($_POST['getCollage'] === "yes" && $_SESSION['saveCollage'])
{
	if (!file_exists($path))
		mkdir($path);
	$collage =  md5(microtime(TRUE)*100000);
	$data = explode( ',', $_SESSION['saveCollage']);
	$collage_path = $path.$collage.".png";
	file_put_contents($path.$collage.".png",  base64_decode($data[1]));
	$user = New user(array(
		"login" => $_SESSION['loggued_on_user'],
		"picture" => $collage,
		));
	$user->addCollage();
	echo $collage_path;
}
if ($_POST['addLike'] === "yes" && $_POST['collage'])
{
	// json of all the pohot liked array[] =   then json decode
	// $_SESSION['collageLiked'] = $_POST['collage']
	$user = New user(array("picture" => $_POST['collage']));
	echo $user->addLike();
}
?>