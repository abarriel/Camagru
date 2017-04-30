
var mousePosition;
var offset = [0,0];
var div;
var isDown = false;

function init_mouse()
{
    div = on_elm;
    div.style.position = "absolute";
    div.style.zIndex = "100";
    div.style.left = "680px";
    div.style.top = "350px";
    div.style.width = "320px";
    div.style.height = "240px";
    document.body.appendChild(div);
}

init_mouse();
div.addEventListener('mousedown', function(e) {
    isDown = true;
    offset = [
    div.offsetLeft - e.clientX,
    div.offsetTop - e.clientY
    ];
    imgX =  div.offsetLeft - e.clientX;
    imgY =  div.offsetTop - e.clientY;
}, true);

document.addEventListener('mouseup', function() {
    isDown = false;
}, true);

document.addEventListener('mousemove', function(event) {
    event.preventDefault();
    if (isDown) {
        mousePosition = {

            x : event.clientX,
            y : event.clientY

        };
        div.style.left = (mousePosition.x + offset[0]) + 'px';
        div.style.top  = (mousePosition.y + offset[1]) + 'px';
        imgX = (mousePosition.x + offset[0]);
        imgY = (mousePosition.y + offset[1]);
    }

}, true);