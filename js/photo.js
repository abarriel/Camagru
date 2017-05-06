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
				obj = JSON.parse(xhr.responseText);
				if (obj['likes'] == 0)
					emo = "😢";
				else
					emo = "😻";
				info.innerHTML = "posted by "+obj['login']+" 🖕<br/> "+obj['likes']+" likes "+emo+"<br/>👯";
				info.innerHTML += "<br/>You need to socialize!";

				JSON.parse(obj['comments']).forEach((elm) =>
				{
					console.log(elm['comment']);
				})

				// console.log(typeof obj['comments'])
			}
		};
		img.src = "../data/image/" +window.location.search.slice(5) + ".png";
	}
}

var addComment = function(evt) {
	evt.preventDefault();
	comment = evt.target[0].value;
	console.log(comment);
	if (comment === "" || comment.match(/^\s+$/))
	{
		alert('Empty Comment');
		return ;
	}
	fetch('../back/getphoto.php',{
		method: 'post',  
		credentials: 'include' ,
		headers: {  
			"Content-type": "application/x-www-form-urlencoded; charset=UTF-8"  
		},  
		body: 'action=addComment&ref='+window.location.search.slice(5)+'&value='+comment
		})  
		.then(  
			function(response) {  
				if (response.status !== 200) {  
					console.log('Looks like there was a problem. Status Code: ' +  response.status);  
					return;  
				}
				response.text().then(function(data) {  
					// console.log(data);  
					// console.log(data[0].usr)
					// console.log(data.length);
				});
			}
		)  
		.catch(function(err) {  
			console.log('Fetch Error :-S', err);  
		});
};

form.addEventListener("submit", addComment, true);
