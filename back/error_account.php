<?php
session_start();
if ($_SESSION['alert'])
{
	echo '<script>alert("'.$_SESSION['alert'].'")</script>';
	unset($_SESSION['alert']);
}
?>