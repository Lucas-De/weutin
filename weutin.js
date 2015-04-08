function onload(){
	document.getElementById('title').style.opacity="1";
	document.getElementById('motto').style.opacity="1";
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
 } 

function showDiv(divName) {
	document.getElementById(divName).style.display = "block";
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