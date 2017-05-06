const img = document.querySelector('img');
const form = document.getElementById('commentForm');
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

var addComment = function(evt) {
    evt.preventDefault();
	comment = evt.target[0].value;
	if (comment === "" || comment.match('/^\s+$/'))
		{
		alert('Empty Comment');
		// return ;
		}
	// if(comment)
    // alert("me and all my relatives are owned by China");
    // console.log(evt.target[0].value);
};
form.addEventListener("submit", addComment, true);
