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
			deleteText = document.createElement("span");
			mycell.appendChild(deleteText);
			mycell.appendChild(text);
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
				console.log(xhr.responseText);
				if (xhr.responseText === "null")
					return;
				Object.entries(JSON.parse(xhr.responseText)).forEach(([key, value]) => {
				elm = document.createElement("img");
				elm.src = "../data/image/"+key+".png";  
				var newContainer = container.cloneNode(true);
				newContainer.appendChild(elm);
				var spanContainer = newContainer.querySelectorAll('span');
				spanContainer[0].innerHTML = "💙 "+ value + "🖊 100 ";
				spanContainer[1].innerHTML = " ❌";
				// console.log(elm);
				spanContainer[1].addEventListener('click',deletePicture, elm);
				spanContainer[1].url = key;
				newContainer.addEventListener('ondblclick',deletePicture);
				album.appendChild(newContainer);
				});
		}
	};
}

function deletePicture(evt){
	var r = confirm("Are you sure you want to delete this picture ?\nPress Ok or Cancel");
    if (r == true)
    	{
	var xhr = getXMLHttpRequest();
	xhr.open("POST", "../back/photos.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("action=deletePicture&key="+evt.target.url);
	xhr.onreadystatechange = () => {
		if (xhr.readyState === 4 && (xhr.status == 200 || xhr.status == 0))
		{	
			console.log(xhr.response);
			console.log(this);
			window.location.reload();
		}
	};
}
}
