<?
session_start();
include('../back/error_account.php');
if (!$_SESSION['loggued_on_user'])
	header("Location: ../index.php");
include('header.php');
include('../config/database.php');
include('../config/user.php');
if ($_GET['ref'])
{
	$user = New user(array("picture" => $_GET['ref']));
	if ($val = $user->ifPicture())
	{
		echo "<script>alert('invalid image you knew it')</script>";
		exit();
	}
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

		</div>
	</div>
	<div id="fb-root"></div>
	<div class="fb-share-button" id="fb_share" data-href="" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="">Share</a></div>
	<div id='containcomments'>
		
	</div>
	<form  method="POST" id="commentForm">
		<input name="comment" type="text" id="usermsg" size="100" />
		<input name="submit" type="submit"  id="submitcomment" value="Send" />
	</form>
</div>
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript" src="../js/photo.js"></script>

