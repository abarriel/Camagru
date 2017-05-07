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


function printCollage(){
	var xhr = getXMLHttpRequest();
	xhr.open("POST", "back/photos.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("action=allPublic");
	console.log("printCollage");
	xhr.onreadystatechange = function() {
		if (xhr.readyState === 4 && (xhr.status == 200 || xhr.status == 0))
		{	
			if (xhr.responseText === "null" || !xhr.responseText)
				return ;
			collages = JSON.parse(xhr.responseText).slice(0,7);
			newCollages = JSON.parse(xhr.responseText).slice(7);
			collages.forEach(function(element, index) {
			elm = document.createElement("img");
			elm.src = "data/image/"+element+".png";  
			var newContainer = container.cloneNode(true);
			newContainer.appendChild(elm);
			album.appendChild(newContainer);
			});
		}
	};
}

const start = 602;
var img = 650;
var imgCount = 0;
album.addEventListener('scroll', function (event) {
    // console.log("" + album.style.height + " : " + album.scrollTop + " : " +album.scrollHeight +" : "+ window.innerHeight );
    if ((parseInt(album.style.height) + album.scrollTop) >= album.scrollHeight)
        {
            newCollages.slice(imgCount,imgCount + 3).forEach(function(element, index){
                elm = document.createElement("img");
                elm.src = "data/image/"+element+".png";  
                var newContainer = container.cloneNode(true);
                newContainer.appendChild(elm);
               album.appendChild(newContainer);
                imgCount++;
            }); 
        }
    });

