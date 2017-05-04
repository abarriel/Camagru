var album = document.getElementById('myalbum');
var collageDiv = document.getElementsByClassName('collagediv');
var collages = 0;
var container = 0;
var overlay = 0;
var myrow = 0;
var mycell = 0;

document.onreadystatechange = () => {
	if (document.readyState === "complete")
		{
			container = document.createElement("div");
			container.id = "container";
			overlay = document.createElement("div");
			overlay.id = "overlay";
			myrow = document.createElement("div");
			myrow.id = "myrow";
			mycell = document.createElement("div");
			mycell.id = "mycell";
			myrow.appendChild(mycell);
			overlay.appendChild(myrow);
			container.appendChild(overlay);
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
			collages = JSON.parse(xhr.responseText).slice(0);
			newCollages = JSON.parse(xhr.responseText).slice(4);
			collages.forEach(function(element, index) {
			elm = document.createElement("img");
			elm.className = "collagediv";
			elm.src = "../data/image/"+element+".png";  
			// collageDiv = elm;
			mycell.innerHTML = "&hearts; 72k &#9658; 25 555";
			var newContainer = container.cloneNode(true);
			newContainer.appendChild(elm);
			album.appendChild(newContainer);
			});
		}
	};
}
