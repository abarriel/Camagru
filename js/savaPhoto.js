// const img = document.querySelector('img');
// const form = document.getElementById('commentForm');
// const fb_share = document.getElementById('fb_share');
// const info = document.getElementById('containinfo');
// const containcomments = document.getElementById('containcomments');

// (function(d, s, id) {
//   var js, fjs = d.getElementsByTagName(s)[0];
//   if (d.getElementById(id)) return;
//   js = d.createElement(s); js.id = id;
//   js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.9&appId=319743485110674";
//   fjs.parentNode.insertBefore(js, fjs);
// }(document, 'script', 'facebook-jssdk'));

// document.onreadystatechange = () => {
// 	if (document.readyState === "complete"){
// 		var xhr = getXMLHttpRequest();
// 		xhr.open("POST", "../back/getphoto.php", true);
// 		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// 		xhr.send("action=all&ref="+window.location.search.slice(5));
// 		xhr.onreadystatechange = function() {
// 			if (xhr.readyState === 4 && (xhr.status == 200 || xhr.status == 0))
// 				{
// 					obj = JSON.parse(xhr.responseText);
// 					if (obj['likes'] == 0)
// 						emo = "😢";
// 						else
// 							emo = "😻";
// 							info.innerHTML = "posted by "+obj['login']+" 🖕<br/> "+obj['likes']+" likes "+emo+"<br/>👯";
// 							info.innerHTML += "<br/>You need to socialize!";
// 							if(!obj['comments'])
// 								return;
// 								JSON.parse(obj['comments']).forEach((elm) =>
// 								{
// 									addTokens(elm['usr'],elm['comment']);				
// 								})
// 							// console.log(window.location);
// 						// console.log(fb_share.getAttribute('data-href'));
// 						fb_share.setAttribute("data-href",window.location.href);

// 						// fb_share.setAttribute("fb-iframe-plugin-query", "app_id=319743485110674&container_width=1273&href=http%3A%2F%2Flocalhost%3A8080%2Fcamagru%2Fclient%2Ftest&layout=button_count&locale=fr_FR&mobile_iframe=true&sdk=joey&size=small");
// 			}
// 		};
// 		img.src = "../data/image/" +window.location.search.slice(5) + ".png";
// 	}
// }
// function addTokens(usr,comment){
// 	var token = document.createElement('div');
// 	token.id = "token";
// 	var tokenName = document.createElement('div');
// 	tokenName.id = "tokenName";
// 	var tokenValue = document.createElement('div');
// 	tokenValue.id = "tokenValue";
// 	tokenName.innerHTML = usr+":";
// 	tokenValue.innerHTML = comment;
// 	token.appendChild(tokenName);
// 	token.appendChild(tokenValue);
// 	containcomments.appendChild(token);
// }
// var addComment = function(evt) {
// 	evt.preventDefault();
// 	comment = evt.target[0].value;
// 	if (comment === "" || comment.match(/^\s+$/))
// 		{
// 			alert('Empty Comment');
// 			return ;
// 		}
// 		fetch('../back/getphoto.php',{
// 			method: 'post',  
// 			credentials: 'include' ,
// 			headers: {  
// 				"Content-type": "application/x-www-form-urlencoded; charset=UTF-8"  
// 			},  
// 			body: 'action=addComment&ref='+window.location.search.slice(5)+'&value='+ encodeURIComponent(comment)
// 		})  
// 		.then(  
// 			function(response) {  
// 				if (response.status !== 200) {  
// 					console.log('Looks like there was a problem. Status Code: ' +  response.status);  
// 					return;  
// 				}
// 				response.text().then(function(data) {  
// 						addTokens(data,comment);
// 				});
// 				form.reset();
// 			}
// 			)  
// 		.catch(function(err) {  
// 			console.log('Fetch Error :-S', err);  
// 		});
// 	};

// 	form.addEventListener("submit", addComment, true);

// function uploadFile(){
// 		fetch('../config/upload.class.php',{
// 			method: 'post',  
// 			credentials: 'include' ,
// 			headers: {  
// 				"Content-type": "application/x-www-form-urlencoded; charset=UTF-8"  
// 			},  
// 			body: 'key=232323&upload=yes&ref='+window.location.search.slice(5)
// 		})  
// 		.then(  
// 			function(response) {  
// 				if (response.status !== 200) {  
// 					console.log('Looks like there was a problem. Status Code: ' +  response.status);  
// 					return;  
// 				}
// 				response.text().then(function(data) {  
// 					console.log(data);
						
// 				});
// 				form.reset();
// 			}
// 			)  
// 		.catch(function(err) {  
// 			console.log('Fetch Error :-S', err);  
// 		});
// }