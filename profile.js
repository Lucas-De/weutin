function picture(){
var userID=getCookie("userID");
document.getElementById("profile_pic").style.backgroundImage="url(uploads/"+userID+".png)";
document.getElementById("profile_pic").style.opacity=1;

// alert("userID= "+userID);
}


function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}