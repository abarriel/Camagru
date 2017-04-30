var elm = document.getElementsByClassName('container_home');

function container_hidden(){
	Array.prototype.forEach.call(elm, function(element){
		// console.log(element);
		// console.log(typeof element);
		element.style.display = "none";
	});
}
function elm_visible(action){
	Array.prototype.forEach.call(elm, function(element){
		var name = element.id.substr(0,element.id.length - 10);
 		// console.log(action.name);
 		// console.log(name);
 		if (action.name === name)
 			element.style.display = "block";
 		else
 			element.style.display = "none";	
 	});
	elm[3].style.display = "block";
	// console.log(elm);
	// container_hidden()
}
function change_account(){
	if (email.value && isValidMail(email.value))
	{
		var xhr = getXMLHttpRequest();
		xhr.open("POST", "../back/modif_session.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		params = 
		"submit="+ encodeURIComponent('Enjoy!') +
		"&email=" + encodeURIComponent(email.value);
		console.log(params);
		xhr.send(params);
		window.location.reload();
	}
	if (old_passwd.value && new_passwd.value)
	{
		var xhr = getXMLHttpRequest();
		xhr.open("POST", "../back/modif_session.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		params = 
		"submit="+ encodeURIComponent('Enjoy!') +
		"&old_passwd=" + encodeURIComponent(old_passwd.value) +
		"&new_passwd=" + encodeURIComponent(new_passwd.value)
		console.log(params);
		xhr.send(params);
		window.location.reload();
	}	
}

function delete_account(){
	var r = confirm("Are you sure you want to delete your account ?\nPress Ok or Cancel");
    if (r == true) {
    	var xhr = getXMLHttpRequest();
		xhr.open("POST", "../back/modif_session.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		params = 
		"submit="+ encodeURIComponent('Enjoy!') +
		"&delete=" + "1";
		xhr.send(params);
		window.location.reload();
    }


	// var xhr = getXMLHttpRequest();
	// 	xhr.open("POST", "back/modif_session.php", true);
	// 	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// 	params = 
	// 	"submit="+ encodeURIComponent('delete!') +
	// 	"&old_passwd=" + encodeURIComponent(old_passwd.value) +
	// 	"&new_passwd=" + encodeURIComponent(new_passwd.value)
	// 	console.log(params);
	// 	xhr.send(params);
	// 	window.location.reload();
	// alert("tes");
}
// function change_password(){
	
// }
// // function okok()
// // {
// // 	console.log("okok");
// // }