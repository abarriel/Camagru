var save = document.getElementById('save');

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
			console.log(collage);
		}
	};
}
save.addEventListener('click',saveCollage);