var album = document.getElementById('album');
var collageDiv = document.getElementById('collagediv');
var heartLike = 0;
var collages = 0;
var newCollages = 0;
var container = 0;
var overlay = 0;
var myrow = 0;
var img = 0;
var mycell = 0;
var clicks = 0, timer = null;

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
			img = document.createElement("img");
			mycell.appendChild(img);
			myrow.appendChild(mycell);
			overlay.appendChild(myrow);
			container.appendChild(overlay);
			printCollage();
		}
}

function getInfoPicture(){
	window.location = '../client/photo.php?ref='+this.stockParams;
}

function printCollage(){
	var xhr = getXMLHttpRequest();
	xhr.open("POST", "../back/photos.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("action=all");
	xhr.onreadystatechange = function() {
		if (xhr.readyState === 4 && (xhr.status == 200 || xhr.status == 0))
		{	
			collages = JSON.parse(xhr.responseText).slice(0,7);
			newCollages = JSON.parse(xhr.responseText).slice(7);
			collages.forEach(function(element, index) {
			elm = document.createElement("img");
			elm.src = "../data/image/"+element+".png";  
			var newContainer = container.cloneNode(true);
			newContainer.appendChild(elm);
			album.appendChild(newContainer);
	    newContainer.stockParams = element;
	    newContainer.addEventListener('click',manageClick);
			});
		}
	};
}

function manageClick(){
	clicks++;
	if(clicks === 1) {
	   timer = setTimeout(() => {
      			getInfoPicture.call(this);
            clicks = 0;  
            }, 300);
        } else {
            clearTimeout(timer); 
            addLike.call(this);
            clicks = 0;  
        }
}

function addLike(){
	var like2Unlike = 0; 
	var xhr = getXMLHttpRequest();
	xhr.open("POST", "../back/save_collage.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	var params = "addLike=yes&collage="+this.childNodes[1].src.slice(-36).slice(0,32);
	xhr.send(params);
	xhr.onreadystatechange = () => {
		if(xhr.readyState === 4 && (xhr.status == 200 ))
			{
				if (xhr.responseText === "like") 
					this.querySelector('img').src = "../data/heart.png";
				else  if (xhr.responseText === "unLike")
					this.querySelector('img').src = "../data/unlike.png";
			}
	};
	this.querySelector('div').style.transition = '1s';
	this.querySelector('div').style.opacity = '1';
	setTimeout(test, 1000, this);
}

function test(elm)
{
	elm.childNodes[0].style.transition = '1s';
	elm.childNodes[0].style.opacity = '0';
}
