var container_home = document.getElementsByClassName('container_home');

function isValidMailReset(mail)
{
	if (!mail.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))
		return (false);
	else
		return (true);
}

function container_hidden(){
	Array.prototype.forEach.call(elm, function(element){
		element.style.display = "none";
	});
}

function elm_visible(value){

	Array.prototype.forEach.call(container_home, function(element){
		var name = element.id.substr(0,element.id.length - 10);
 		if (value === name)
 			element.style.display = "block";
 		else
			element.style.display = "none";	
 	});
	container_home[3].style.display = "block";
}

function change_account(){
	if (email[0].value && isValidMailReset(email[0].value))
	{
		var xhr = getXMLHttpRequest();
		xhr.open("POST", "../back/modif_session.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		params = 
		"submit="+ encodeURIComponent('Enjoy!') +
		"&email=" + encodeURIComponent(email[0].value);
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
}
