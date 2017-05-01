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