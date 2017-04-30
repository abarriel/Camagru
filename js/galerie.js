var save = document.getElementById('save');
var galerie = document.getElementById('galerie');
function saveCollage(){
	var xhr = getXMLHttpRequest();
	xhr.open("POST", "../back/save_collage.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	params = 
	"getCollage=yes";
	xhr.send(params);
	xhr.onreadystatechange = function() {
		if (xhr.readyState === 4 && xhr.status === 200) 
		{
			var collage = xhr.responseText;		
			save.disabled = true;
			// console.log(collage);
		}
	};
}
function printCollage(){
	var xhr = getXMLHttpRequest();
	xhr.open("POST", "../back/photos.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(null);
	xhr.onreadystatechange = function() {
		if (xhr.readyState === 4 && xhr.status === 200) 
		{
			var collage = xhr.responseText;	
			JSON.parse(collage).reverse().forEach(function(element, index) {
			elm = document.createElement("img");
			// elm.setAttribute("width", "150");
			// elm.setAttribute("height", "150");
			elm.src = "../data/image/"+element+".png";  
			galerie.appendChild(elm);
			console.log('pooque');	
			});
		}
	};
	// console.log("Genre");
}
save.addEventListener('click',saveCollage);