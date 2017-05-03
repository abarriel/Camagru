var album = document.getElementById('album');
var collageDiv = document.getElementById('collagediv');
var collages = 0;
var newCollages = 0;
var container = 0;
var overlay = 0;
var myrow = 0;
var mycell = 0;
// album.style.with = "1970px";
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
			collages = JSON.parse(xhr.responseText).slice(0,7);
			newCollages = JSON.parse(xhr.responseText).slice(7);
			collages.forEach(function(element, index) {
			elm = document.createElement("img");
	    	elm.ondblclick = addLike;
			elm.src = "../data/image/"+element+".png";  
			var newContainer = container.cloneNode(true);
			newContainer.appendChild(elm);
			album.appendChild(newContainer);
			// album.appendChild(elm);
			// console.log(elm);	
			});
		}
	};
	// console.log("Genre");
}

function addLike()
{
    console.log("test");
}