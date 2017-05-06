const img = document.querySelector('img');
const info = document.getElementById('containinfo');
var xhr = getXMLHttpRequest();
document.onreadystatechange = () => {
	if (document.readyState === "complete"){
		xhr.open("POST", "../back/getphoto.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send("action=all&ref="+window.location.search.slice(5));
		xhr.onreadystatechange = function() {
		if (xhr.readyState === 4 && (xhr.status == 200 || xhr.status == 0))
			{	
				// info.innerHTML = xhr.responseText;
				obj = JSON.parse(xhr.responseText);
				// console.log(obj['likes'])
				if(obj['likes'] == 0)
					emo = "😢";
				else
					emo = "😻";
				info.innerHTML = "posted by "+obj['login']+" 🖕<br/> "+obj['likes']+" likes "+emo+"<br/>👯";
				info.innerHTML += "<br/>You need to socialize!";
			}
		};
		img.src = "../data/image/" +window.location.search.slice(5) + ".png";
 		}
 }