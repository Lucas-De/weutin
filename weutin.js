function onload(){
	document.getElementById('title').style.opacity="1";
	document.getElementById('motto').style.opacity="1";
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
 } 

function showDiv(divName) {
	document.getElementById(divName).style.visibility = "visible";
	document.getElementById(divName).style.opacity = "1";
}
function hideDiv(divName) {
	document.getElementById(divName).style.display = "none";
}

function create_account(){
	var email=document.getElementById('email').value;
	var password=document.getElementById('password').value;
	var fullname=document.getElementById('fullname').value;




	if(password!="" & fullname!=""  & validateEmail(email)){
	window.location.href = "weutin_create.php?email=" + email + "&name=" + fullname + "&password=" + password;
	}
	else{
		alert("ENTER YOUR DETAILS CORRECTLY MR. TOTS");
	}
}

function submitLoginData(){
	var email=document.getElementById('emailLogin').value;
	var password=document.getElementById('passwordLogin').value;

	if(password!=""  & validateEmail(email)){
	window.location.href = "login.php?email=" + email + "&password=" + password;
	// alert("login.php?email=" + email + "&password=" + password);
	}
}