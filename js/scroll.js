const start = 602;
var img = 650;
var imgCount = 0;
album.addEventListener('scroll', function (event) {
    console.log("" + album.style.height + " : " + album.scrollTop + " : " +album.scrollHeight +" : "+ window.innerHeight );
    if ((parseInt(album.style.height) + album.scrollTop) >= album.scrollHeight)
        {
            console.log("ok");
                newCollages.slice(imgCount,imgCount + 3).forEach(function(element, index){
                elm = document.createElement("img");
                elm.ondblclick = addLike;
                elm.src = "../data/image/"+element+".png";  
                var newContainer = container.cloneNode(true);
            newContainer.appendChild(elm);
            album.appendChild(newContainer);
                imgCount++;
                }); 
        }
});