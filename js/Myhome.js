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
			text = document.createElement("span");
			// img = document.createElement("img");
			mycell.appendChild(text);
			// mycell.appendChild(img);
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
		xhr.send("action=myself");
		console.log("printCollage");
		xhr.onreadystatechange = function() {
			if (xhr.readyState === 4 && (xhr.status == 200 || xhr.status == 0))
				{	
				Object.entries(JSON.parse(xhr.responseText)).forEach(([key, value]) => {
				elm = document.createElement("img");
				elm.src = "../data/image/"+key+".png";  
				var newContainer = container.cloneNode(true);
				newContainer.appendChild(elm);
				newContainer.querySelector('span').innerHTML = "💙 "+ value + "🖊 100";
				newContainer.addEventListener('ondblclick',deletePicture);
				album.appendChild(newContainer);
				});
			// console.log(Object.(xhr.responseText));
			// console.log(xhr.responseText.split(","));

		}
	};
}

function deletePicture(){
	console.log("d");
	// var xhr = getXMLHttpRequest();
	// xhr.open("POST", "../back/photos.php", true);
	// xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// xhr.send("action=getLike");
	// if (xhr.readyState === 4 && (xhr.status == 200 || xhr.status == 0))
	// 	{	
	// 		this.querySelector('span').innerHTML = this.querySelector('img').src;
	// 	}
	// console.log("d");
}
