var album = document.getElementById('myalbum');
var collageDiv = document.getElementsByClassName('collagediv');
var collages = 0;
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

// <div id="container">
//     <img src="http://i.imgur.com/o7iAFMu.jpg" class="test" />
//     <div id="overlay">
//         <div id="myrow">
//             <div id="mycell">Some Text</div>
//         </div>
//     </div>
// </div>
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

const start = 602;
var img = 650;
var imgCount = 0;
// album.addEventListener('scroll', function (event) {
	// if (document.body.scrollHeight == 
 //        document.body.scrollTop +        
 //        window.innerHeight) {
 //        alert("Bottom!");
    // }
   // console.log("ScroolHeight: "+document.body.scrollHeight+" ScrollTop:"+document.body.scrollTop+" windowinnerheight :" window.innerHeight);
    // console.log("Scroll ="+album.scrollLeft+" || img ="+img+" || imgCount="+ imgCount);
    // if (album.scrollLeft >= (start + ((img * imgCount) - 5))) {
    //     newCollages.slice(imgCount,imgCount + 2).forEach(function(element, index){
    //         elm = document.createElement("img");
    //         elm.style.display = "interval";
    //         elm.style.marginLeft = "10px";
    //         elm.style.marginTop = "10px";
    //         elm.src = "../data/image/"+element+".png";  
    //         album.appendChild(elm);
    //         // console.log(element);
    //         imgCount++;
    //     });
    //         // elm = document.createElement("img");
    //         // elm.style.display = "interval";
    //         // elm.style.marginLeft = "10px";
    //         // elm.src = "../data/image/75c4b3024b1c6cae23d0d5cb69a08da5.png";  
    //         // album.appendChild(elm);

    //         // imgCount++;
    //     }
// });