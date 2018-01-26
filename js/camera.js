var video = document.getElementById('video');
var canvas = document.getElementById('canvas');
var canvasUpload = document.getElementById('canvasUpload');
var videoStream = null;
var preLog = document.getElementById('preLog');

function log(text)
{
  if (preLog) preLog.textContent += ('\n' + text);
  else alert(text);
}

function snapshot()
{
  var ctx = canvas.getContext('2d');
  var xhr = getXMLHttpRequest();
  var imageObj2 = new Image();
  var imageObj1 = new Image();

   
  if (save) save.disabled = false;
  canvas.style.display = "block";
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  if (viewUpload.src.length > 100)
  {
    imageObj1.src = viewUpload.src;
    ctx.drawImage(imageObj1, 0, 0);
  }
  else
    ctx.drawImage(video, 0, 0);
  var data = canvas.toDataURL('image/png');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) 
    {
      ctx = canvas.getContext('2d');
      imageObj1.src = xhr.responseText;
      ctx.drawImage(imageObj1,0,0);
    }
  };
  xhr.open("POST", "../back/image.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  params = "datawebcam="+ encodeURIComponent(data) +
  "&filter=" + encodeURIComponent(parseInt(on_elm.id)) +
  "&datafilter=" + encodeURIComponent(viewUpload.src) +
  "&imgx=" + (imgX - 680) +
  "&imgy=" + (imgY - 250);
  xhr.send(params);
  on_elm.style.left = "-9999px";
  save.style.display = "block";
}

function noStream()
{
  log('L’accès à la caméra a été refusé !');
}

function stop()
{
  canvasUpload.style.display = "none";
  canvas.style.display = "none";
  viewUpload.src = "";
  var myButton = document.getElementById('buttonStop');
  if (myButton) myButton.disabled = true;
  myButton = document.getElementById('buttonSnap');
  if (myButton) myButton.disabled = false;
  if (videoStream)
  {
    if (videoStream.stop) videoStream.stop();
    else if (videoStream.msStop) videoStream.msStop();
    videoStream.onended = null;
    videoStream = null;
  }
  if (video)
  {
    video.onerror = null;
    video.pause();
    if (video.mozSrcObject)
      video.mozSrcObject = null;
    video.src = "";
  }
  myButton = document.getElementById('buttonStart');
  on_elm.style.display = "none";
  if (myButton) myButton.disabled = false;
}

function gotStream(stream)
{
  save.style.display = "none";
  video.style.display = "block";
  hideUpload.style.display = "none";
  var myButton = document.getElementById('buttonStart');
  if (myButton) myButton.disabled = true;
  videoStream = stream;

  video.onerror = function ()
  {
    if (video) stop();
  };
  stream.onended = noStream;
  if (window.URL) video.src = window.URL.createObjectURL(stream);
  else if (video.mozSrcObject !== undefined)
  {
    video.mozSrcObject = stream;
    video.play();
  }
  else if (navigator.mozGetUserMedia)
  {
    video.src = stream;
    video.play();
  }
  else if (window.URL) video.src = window.URL.createObjectURL(stream);
  else video.src = stream;
  myButton = document.getElementById('buttonSnap');
  if (myButton) myButton.disabled = true;
  myButton = document.getElementById('buttonStop');
  if (myButton) myButton.disabled = false;
}

function start()
{
  save.style.display = "none";
  canvasUpload.style.display = "none";
  if ((typeof window === 'undefined') || (typeof navigator === 'undefined')) log('Cette page requiert un navigateur Web avec les objets window.* et navigator.* !');
  else if (!(video && canvas)) log('Erreur de contexte HTML !');
  else
  {
    if (navigator.getUserMedia) navigator.getUserMedia({video:true}, gotStream, noStream);
    else if (navigator.oGetUserMedia) navigator.oGetUserMedia({video:true}, gotStream, noStream);
    else if (navigator.mozGetUserMedia) navigator.mozGetUserMedia({video:true}, gotStream, noStream);
    else if (navigator.webkitGetUserMedia) navigator.webkitGetUserMedia({video:true}, gotStream, noStream);
    else if (navigator.msGetUserMedia) navigator.msGetUserMedia({video:true, audio:false}, gotStream, noStream);
    else log('getUserMedia() n’est pas disponible depuis votre navigateur !');
  }
}
start();
document.getElementById('footer').addEventListener('click',function(){
  this.style.display = "none";
});
document.getElementById('buttonSnap').addEventListener('click',snapshot);