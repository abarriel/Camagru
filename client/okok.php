<form method="POST" action="http://uploads.im/api?upload" enctype="multipart/form-data">
  <input  id="file" type="file" name="file" />
  <input type="submit" value="SEND FILE">
</form>
<script type="text/javascript">
const upload = document.getElementById("file");
	const loadImage = (file) => {
	var fr = new FileReader();
	fr.readAsDataURL(file);
	fr.onload = function () {
		console.log(file);
		// video.style.display = "none";
		// on_elm.style.left = "-9999px";
		// canvasUpload.style.display = "block";
		// canvas.style.display = "none";
		// hideUpload.style.display = "block";
		// viewUpload.src = this.result;
		// var width = 650;
		// var height = 480;
		// img = document.createElement("img");
		// canvasUpload.width = width;
		// canvasUpload.height = height;
		// var ctx = canvasUpload.getContext("2d");
		// ctx.drawImage(viewUpload, 0, 0, width, height);
		// var dataurl = canvasUpload.toDataURL("image/png");
		// viewUpload.src = dataurl;
	};

}
	function uploadFile(evt){
	var tgt = evt.target || window.event.srcElement,
	files = tgt.files;
	loadImage(files[0]);
	// checkImage(files[0], loadImage);
}
upload.addEventListener("change",uploadFile);
	</script>