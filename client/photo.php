<?
session_start();
include('../back/error_account.php');
if(!$_SESSION['loggued_on_user'])
	header("Location: ../index.php");
include('header.php');
include('../config/database.php');
include('../config/user.php');
if ($_GET['ref'])
{
	$user = New user(array("picture" => $_GET['ref']));
	if($val = $user->ifPicture())
	{
		echo "<script>alert('invalid image you knew it')</script>";
		exit();
	}
	// echo "<div id='containerphoto'><div id='containphoto'><img src='http://127.0.0.1:8080/camagru/data/image/".$_GET['ref'].".png'></div></div>";
	
}
else
{
	echo "<script>alert('invalid image you knew it')</script>";
	exit();
}
?>

<div id='containerphoto'>
	<div id="allinfo">
		<div id='containphoto'>
			<img src=""></img>
		</div>
		<div id='containinfo'>
			<!-- Damso "N. J Respect R" 
Extrait de son nouvel album "IPSÉITÉ" disponible en streaming et sur iTunes ici :
https://damso.lnk.to/ipseite -->
		</div>
	</div>
		<div id='containcomments'>
			<p>Comments</p>
			<!-- It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). -->
		</div>
	</div>

	<script type="text/javascript" src="../js/photo.js"></script>

