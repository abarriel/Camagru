<?php
session_start();
include("config/setting.php");
if (isset($_SESSION['loggued_on_user']))
	header('Location: client/home.php');
if ($_SESSION['alert'] === "register_but_not_confirm")
{
	echo "<script>alert('Welcome! We sent to you an email of confirmation, please check your mailbox!')</script>";
	unset($_SESSION['alert']);
}
include('back/error_account.php');
?>
<head>
  <meta charset="utf-8">
  <link rel="icon" href="fav.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
  <link rel="stylesheet" type="text/css" href="css/form.css">
  <title>Camagru</title>
	<!-- <script type="text/javascript" src="js/facebook_register.js"></script> -->
</head>
<body>

	<div id="main">
	<div id="side"></div>
	<div id="presentation">
		Yes!<br/>Camagru just released 2017
	</div>
	<div class="container">
	<button class="button" onclick="visibility_register()">Register</button>
	<button class="button" onclick="visibility_login()">Login</button>
	<button class="button" onclick="hide_password()">Password?</button>
	</div>
	<form class="form_index" id="register-form" method="POST" action="back/session.php" onsubmit="return isValidForm()">
		<p>Register</p>
				<input class="inpu" type="email" name="email" id="email" placeholder="Type your E-mail address" required></input><br />
				<input class="inpu" type="text" name="login" id="login" placeholder="Type your login here" required></input><br />
				<input class="inpu" type="password" name="password" id="password" placeholder="Type your Password" required></input><br />
				<input class="inpu" type="password" name="password" id="repeat_password" placeholder="Repeat your Password" required></input><br />
				<input  type="submit" name="submit" value="Register!" id="submit" class="button"/>
				<div id="status"></div>
			<div id="errorContainer"></div>
		</form>
		<form class="form_index" id="login-form" method="POST" action="back/session.php">
		<p>Login</p>
				<input class="inpu" type="email" name="email" id="email" placeholder="Type your E-mail address" required></input><br />
				<input class="inpu" type="password" name="passwd" id="passwd" placeholder="Type your Password" required></input><br />
				<input  type="submit" name="submit" value="Login!" id="submit"  class="button"/>
				<br /><p>Create or Log-in using facebook</p>
				<br />
			<div id="errorContainer"></div>
		</form>
		<form class="form_index" id="reset-form" method="POST" action="back/session.php">
		<p>Forget your password?</p>
				<input class="inpu" type="email" name="email" id="email_" placeholder="Type your E-mail address"  required></input><br />
				<input  type="submit" name="submit" value="Send!" id="submit" onclick="forget_password()" class="button"/>
			<div id="errorContainer"></div>
		</form>
			<form class="form_index" id="forget-form" method="POST" action="back/session.php"  onsubmit="return isValidForm2()">
		<p>Reset your password!</p>
				<input class="inpu" type="password" name="res_password" id="res_password" placeholder="Type your Password" required></input><br />
				<input class="inpu" type="password" name="res_repeat_password" id="res_repeat_password" placeholder="Repeat your Password" required></input><br />
				<input  type="submit" name="submit" value="Reset!" id="submit"  class="button"/>
			<div id="errorContainer"></div>
		</form>
				<div id="back"><button class="button" onclick="visibility_div_register()">Back</button></div></div>
	
<?php
// include('client/footer.php');
?>
</body>

<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/parse_register.js"></script>
<script type="text/javascript" src="js/index_pass.js"></script>
<?php
if ($_GET['login'] && $_GET['cle'])
{
	$_SESSION['login_reset'] = $_GET['login'];
	$_SESSION['cle_reset'] = $_GET['cle'];
	echo "<script>visibility_forget_form()</script>";
}
?>