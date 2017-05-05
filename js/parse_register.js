const email = document.getElementById('email')
const password = document.getElementById('password');
const login = document.getElementById('login')
const form = document.getElementById('register-form')
const repeat_password = document.getElementById('repeat_password');
const errorContainer = document.getElementById('errorContainer');
const login_form = document.getElementById('login-form');
const forget_form = document.getElementById('forget-form');
const reset_form = document.getElementById('reset-form');
const button = document.getElementsByClassName('container')[0];
const back = document.getElementById('back');

const checkMail = ({ target: { value } }) => {
	if (value === "" || value.match('/^\s+$/'))
		email.style.backgroundColor = "white";
	else if (!value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))
		email.style.backgroundColor = "#e74c3c";
	else
		email.style.backgroundColor = "#27ae60";
}

const checkName = ({ target: { value } }) => {
	if (value === "" || value.match('/^\s+$/'))
		login.style.backgroundColor = "white";
	else if (!value.match(/^\w{3,25}$/))
		login.style.backgroundColor = "#e74c3c";
	else
		login.style.backgroundColor = "#27ae60";
}

const checkPassword = () =>{
	if (repeat_password.value === "")
		return ;
	if (repeat_password.value !== password.value)
	{
		repeat_password.style.backgroundColor = "#e74c3c";
		errorContainer.innerHTML = "Hint : You shall repeat your password correctly";
	
	}
	else
	{
		repeat_password.style.backgroundColor = "#27ae60";
		errorContainer.innerHTML = "";
	}
}
const checkPasswordType = () => {
	
	if (!password.value.match(/^(?=.*[a-z])(?=.*\d)(?=.*(_|[^\w])).{5,}$/))
	{
		password.style.backgroundColor = "#e74c3c";
		errorContainer.innerHTML = "Hint : You password must contains at least a digit and a special char!";
	}
	else
	{
		password.style.backgroundColor = "#27ae60";
		errorContainer.innerHTML = "";
	}
}

function visibility_forget_form()
{
	forget_form.style.display = "block";
	form.style.display = "none";
	button.style.display = "none";
	back.style.display = "block";
}
function visibility_register()
{
	form.style.display = "block";
	login_form.style.display = "none";
	button.style.display = "none";
	back.style.display = "block";
}

function visibility_login()
{
	login_form.style.display = "block";
	form.style.display = "none";
	button.style.display = "none";
	back.style.display = "block";
}

function visibility_div_register()
{
	login_form.style.display = "none";
	reset_form.style.display = "none";
	form.style.display = "none";
	button.style.display = "block";
	back.style.display = "none";
}
function isValidMail(mail)
{
	if (!mail.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))
		return (false);
	else
		return (true);
}

function isValidLogin(login)
{
	if (!login.match(/^\w{3,25}$/))
		return (false);
	else
		return (true);
}
function isValidPassword(password, repeat_password)
{
	if ((password === repeat_password) && password.match(/^(?=.*[a-z])(?=.*\d)(?=.*(_|[^\w])).{5,}$/))
		return (true);
	else
		return (false);
}

function isValidForm()
{
	if (!isValidMail(email.value) || !isValidLogin(login.value))
		return (false);
	if (!isValidPassword(repeat_password.value, password.value))
		return (false);
	return (true);
}

function hide_password()
{
	reset_form.style.display = "block";
	form.style.display = "none";
	button.style.display = "none";
	back.style.display = "block";
}

if(email)
email.addEventListener('keyup', checkMail)
if(login)
login.addEventListener('keyup', checkName)
if(repeat_password)
repeat_password.addEventListener('keyup', checkPassword)
if(password)
{
password.addEventListener('keyup', checkPasswordType)
password.addEventListener('keyup', checkPassword)
}
