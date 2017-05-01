var album = document.getElementById('album');
var collageDiv = document.getElementById('collagediv');
var collages = 0;
var newCollages = 0;
// album.style.with = "1970px";
document.onreadystatechange = () => {
	if (document.readyState === "complete")
		{
	console.log("log");
			printCollage();
		}
}

function printCollage(){
	var xhr = getXMLHttpRequest();
	xhr.open("POST", "../back/photos.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(null);
	console.log("printCollage");
	xhr.onreadystatechange = function() {
		if (xhr.readyState === 4 && (xhr.status == 200 || xhr.status == 0))
		{	
			collages = JSON.parse(xhr.responseText).slice(0,4);
			newCollages = JSON.parse(xhr.responseText).slice(4);
			collages.forEach(function(element, index) {
			// if(index)
			elm = document.createElement("img");
			elm.id = "collagediv";
			elm.style.display = "interval";
			elm.style.marginLeft = "10px";
			elm.src = "../data/image/"+element+".png";  
			collageDiv = elm;
			album.appendChild(elm);
			// console.log(elm);	
			});
		}
	};
	// console.log("Genre");
}