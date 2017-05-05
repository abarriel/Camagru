<?php
session_start();
date_default_timezone_set('CET');
// include('class.php');
?>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="../data/camera.svg" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/form.css">
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<link rel="stylesheet" type="text/css" href="../css/galerie.css">
	<link rel="stylesheet" type="text/css" href="../css/webcam.css">
	<title>Camagru</title>
</head>
<header>
	<div class="menu_text">
		<a href="galerie.php" class="text_header" >Accueil</a>
		<a href="albums.php" class="text_header" >Galerie</a>
		<a href="home.php" class="text_header" >Home</a>
		<a href="logout.php" class="text_header" >Logout</a>
	</div>
	<div class="menu_text" style="background-color: rgb(255,252,0); width: 100%">
		<div class="menu_text">
			<?php
			if( $_SERVER['REQUEST_URI'] === "/camagru/client/home.php")
			{
				echo '<a href="#" class="text_header" name="email" style="font-size:small" onclick="elm_visible(this.name)">Change Mail</a>';
				echo '<a href="#" class="text_header" name="password" style="font-size:small"  onclick="elm_visible(this.name)" >Change Password</a>';
				echo '<a href="#" class="text_header" name="bio" style="font-size:small"  onclick="elm_visible(this.name)" >Change Bio</a>';
				echo'<a href="#" class="text_header" name="delete" style="font-size:small" onclick="delete_account(this.name)">Delete</a>';
			}
			?>
		</div>
	</div>
</header> 
<body>
	<script type="text/javascript" src="../js/home.js"></script>