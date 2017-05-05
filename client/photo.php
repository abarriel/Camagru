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
	echo "<img src='http://127.0.0.1:8080/camagru/data/image/".$_GET['ref'].".png'>";
}
?>
<!-- <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.9&appId=319743485110674";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-share-button" data-href="http://127.0.0.1:8080/camagru/data/image/18602a27dd295b1c9a79f1b9e7a25e7f.png" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8080%2Fcamagru%2Fdata%2Fimage%2F18602a27dd295b1c9a79f1b9e7a25e7f.png&amp;src=sdkpreparse">Share</a></div> -->
