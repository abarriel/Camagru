var album = document.getElementById('myalbum');
var collageDiv = document.getElementById('collagediv');
var collages = 0;
var newCollages = 0;
var imgContain = 0;
var textHover = 0;
// album.style.with = "1970px";
document.onreadystatechange = () => {
	if (document.readyState === "complete")
		{
			imgContain = document.createElement("div");
			imgContain.className = "imgContain";
			textHover = document.createElement("div");
			textHover.className = "textHover";
			// textHover.content = 'My text here'
			textHover.innerHTML = "my TEXT HERE";
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
			collages = JSON.parse(xhr.responseText).slice(0);
			newCollages = JSON.parse(xhr.responseText).slice(4);
			collages.forEach(function(element, index) {
			// var divClone = imgContain.cloneNode(true);
			// var textClone = textHover.cloneNode(true);
			// album.appendChild(divClone);
			// divClone.appendChild(textClone);
			elm = document.createElement("img");
			album.appendChild(elm);
			elm.id = "collagediv";
			elm.style.display = "interval";
			elm.style.marginLeft = "10px";
			elm.style.marginTop = "10px";
			elm.src = "../data/image/"+element+".png";  
			collageDiv = elm;
			// divClone.appendChild(elm);
			});
		}
	};
}

const start = 602;
var img = 650;
var imgCount = 0;
album.addEventListener('scroll', function (event) {
    console.log("Scroll ="+album.scrollLeft+" || img ="+img+" || imgCount="+ imgCount);
    if (album.scrollLeft >= (start + ((img * imgCount) - 5))) {
        newCollages.slice(imgCount,imgCount + 2).forEach(function(element, index){
            elm = document.createElement("img");
            elm.style.display = "interval";
            elm.style.marginLeft = "10px";
            elm.style.marginTop = "10px";
            elm.src = "../data/image/"+element+".png";  
            album.appendChild(elm);
            // console.log(element);
            imgCount++;
        });
            // elm = document.createElement("img");
            // elm.style.display = "interval";
            // elm.style.marginLeft = "10px";
            // elm.src = "../data/image/75c4b3024b1c6cae23d0d5cb69a08da5.png";  
            // album.appendChild(elm);

            // imgCount++;
        }
});