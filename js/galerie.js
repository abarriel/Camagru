var save = document.getElementById('save');
var galerie = document.getElementById('galerie');
var fullPage = document.querySelector('.full_page');

function saveCollage(){
	var xhr = getXMLHttpRequest();
	xhr.open("POST", "../back/save_collage.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	params = 
	"getCollage=yes";
	xhr.send(params);
	console.log("SaveCollage");
	xhr.onreadystatechange = function() {
		if (xhr.readyState === 4 && xhr.status === 200) 
		{
			var collage = xhr.responseText;		
			save.disabled = true;
			addCollage(collage);
		}
	};
}

function addCollage(path){
	elm = document.createElement("img");
	elm.src = path;
	// console.log("s");
	galerie.appendChild(elm);
	// galerie.insertbefore(elm, galerie);
	// insertbefore	
	
}

function printCollage(){
	var xhr = getXMLHttpRequest();
	xhr.open("POST", "../back/photos.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("action=all");
	console.log("printCollage");
	xhr.onreadystatechange = function() {
		if (xhr.readyState === 4 && (xhr.status == 200 || xhr.status == 0))
		{	

			var collage = xhr.responseText;	
			JSON.parse(collage).reverse().forEach(function(element, index) {
			elm = document.createElement("img");
			elm.src = "../data/image/"+element+".png";  
			galerie.appendChild(elm);
			});
		}
	};
}

save.addEventListener('click',saveCollage);
