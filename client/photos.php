<?php
session_start();
if (!$_SESSION['loggued_on_user'])
	header("Location: ../index.php");
// include("header.php");
// include("../back/image.php");
// include ('../config/account.php');
// include("../back/error_account.php");
// echo '<script>alert("'.$_SESSION['ok'].'")</script>';
?>
<div class="galerie">
		<h2>Galerie</h2>
	</div>