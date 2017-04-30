var res_password = document.getElementById('res_password');
var res_repeat_password = document.getElementById('res_repeat_password');
function forget_password(){
	email_ = document.getElementById('email_');
	var xhr = getXMLHttpRequest();
	xhr.open("POST", "back/forget_password.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("forget=1&login="+email_.value);
}

const checkPassword2 = () =>{
	if (res_repeat_password.value === "")
		return ;
	if (res_repeat_password.value !== res_password.value)
	{
		res_repeat_password.style.backgroundColor = "#e74c3c";
		errorContainer.innerHTML = "Hint : You shall repeat your password correctly";
	}
	else
	{
		res_repeat_password.style.backgroundColor = "#27ae60";
		errorContainer.innerHTML = "";
	}
}
function isValidForm2()
{
	if (!isValidPassword(res_password.value, res_repeat_password.value))
		return (false);
	return (true);
}
if(res_repeat_password)
res_repeat_password.addEventListener('keyup', checkPassword2)
if(res_password)
res_password.addEventListener('keyup', checkPassword2)
