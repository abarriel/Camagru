<?php
session_start();
if (!$_SESSION['loggued_on_user'])
	header("Location: ../index.php");
include("header.php");
// include("../back/image.php");
// include ('../config/account.php');
include("../back/error_account.php");
// echo '<script>alert("'.$_SESSION['ok'].'")</script>';
?>
<div class="full_page">
	<!-- <div class="webcam"> -->
	<div class="galerie" id="galerie">
		<h2>Last pictures taken </h2>
	</div>
	<div class="capture">
		<div class="button_snap">
		
			<img id="img"/>
			<input type="image" src="../data/camera.svg" alt="Submit" type="button" id="buttonSnap" width="48"  height="48"/>
			<input type="image" src="../data/start.png" alt="Submit" width="48" height="48" id="buttonStart" value="Démarrer" disabled="disabled" onclick="start()"/>
			<input type="image" src="../data/reset.png" alt="Submit" width="48" height="48" id="buttonStop" value="Stop" disabled="disabled" onclick="stop()"/>
			<label for="file-input">
				<img src="../data/folder.png"  width="48" height="48" />
			</label>
			<input id="file-input" type="file"/>
		</div>
		<div class="context_video">
			<div id="hideUpload" style="display:none"><img id="viewUpload"></div>
			<div id="superpose_capture"></div>
			<!-- <img src="" height="200" id="okokok" alt="Image preview...">			 -->
			<video id="video" autoplay="autoplay"></video>
			<canvas id="canvasUpload"></canvas>
			<canvas id="canvas"></canvas>
		</div>
		<input  type="submit" name="submit" value="Save!" id="save" class="button"/>
	</div>
	
	<h2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Filters... <span id="selectBackground" ></span></h2>
	<div id="filter">
	</div> </div>
	<?php include("footer.php");?>
	<script type="text/javascript" src="../js/ajax.js"></script>
	<script type="text/javascript" src="../js/webcam.js"></script>
	<script type="text/javascript" src="../js/camera.js"></script>
	<script type="text/javascript" src="../js/mouse.js"></script>
	<script type="text/javascript" src="../js/galerie.js"></script>
