const filter = document.getElementById("filter");
var on_elm = document.getElementById("superpose_capture");
const upload = document.getElementById("file-input");
const viewUpload = document.getElementById("viewUpload");
const hideUpload = document.getElementById("hideUpload");
var imgX = 680;
var newFile = 0;
var imgY = 350;

function	addFilter(index)
{

	document.getElementById('buttonSnap').disabled = false;
	// console.log(index);
	on_elm.style.background = "url(../data/"+index+".png";
	on_elm.style.display = "block";
	on_elm.style.backgroundRepeat = "no-repeat";
	on_elm.style.backgroundSize=  "320px 240px";
	on_elm.setAttribute("id", index+"s");
	on_elm.style.left = "680px";
	on_elm.style.top = "350px";
	return on_elm;
}

document.onreadystatechange = () => {
	if (document.readyState === 'complete') {
		var imgs =  Array.apply(null, Array(23));
		imgs.forEach(function(element,index){
			elm = document.createElement("img");
			elm.setAttribute("width", "150");
			elm.setAttribute("id", index);
			elm.addEventListener('click', function() {
				addFilter(index);
			});
			elm.setAttribute("height", "150");
			elm.src = "../data/"+index+".png";  
			filter.appendChild(elm);
		});
		printCollage();
	}
}

const checkImage = (file, cb) => {
	const img = new Image();

	const _URL = window.URL || window.webkitURL;

	img.onload = () => {
		cb(file);
	}

	img.onerror = () => {
		alert("Wrong Type!");
	}
	console.log(file);
	if(file)
	img.src = _URL.createObjectURL(file);
}

const loadImage = (file) => {
	var fr = new FileReader();
	fr.readAsDataURL(file);
	fr.onload = function () {
		video.style.display = "none";
		on_elm.style.left = "-9999px";
		canvasUpload.style.display = "block";
		canvas.style.display = "none";
		hideUpload.style.display = "block";
		viewUpload.src = this.result;
		var width = 650;
		var height = 480;
		img = document.createElement("img");
		canvasUpload.width = width;
		canvasUpload.height = height;
		var ctx = canvasUpload.getContext("2d");
		ctx.drawImage(viewUpload, 0, 0, width, height);
		var dataurl = canvasUpload.toDataURL("image/png");
		viewUpload.src = dataurl;
	};

}

function uploadFile(evt){

	var tgt = evt.target || window.event.srcElement,
	files = tgt.files;
	checkImage(files[0], loadImage);
}
upload.addEventListener("change",uploadFile);