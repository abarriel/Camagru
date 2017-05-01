<?php
session_start();
include('../back/error_account.php');
if(!$_SESSION['loggued_on_user'])
	header("Location: ../index.php");
include('header.php');
echo '<div class="container_home" value="email" id="email_container">
<a href="#"><span>Change Mail<span></a></br>
<input class="inpu" type="email" name="email" id="email" placeholder="Your new email here" required></input>
</div>';
echo '<div class="container_home" value="bio" id="bio_container">
	<a href="#"><span>Change Bio<span></a></br>
	<input class="inpu" type="email" name="bio" id="email" placeholder="Your new bio" required></input>
</div>';
echo '<div class="container_home" value="password" id="password_container">
<a href="#"><span>Change Password<span></a></br>
	<input class="inpu" type="password" name="password" id="old_passwd" placeholder="Your old password" required></input>
	<input class="inpu" type="password" name="password" id="new_passwd" placeholder="Your new password" required></input>
</div>';
echo '<div class="container_home" value="button" id="button_container"> <input type="submit" value="Enjoy!" class="button" onclick="change_account()"></input></div>';
?>
<link rel="stylesheet" type="text/css" href="../css/myhome.css">
<div id="myalbum">
	
</div>
<script type="text/javascript" src="../js/Myhome.js"></script>
<!-- <script type="text/javascript" src="../js/scroll.js"></script> -->
<script type="text/javascript" src="../js/ajax.js"></script>
</body>
