var name=document.getElementById("name");
var email=document.getElementById("email");
var phoneno=document.getElementById("password");
var desciption=document.getElementById("desciption");
var dob=document.getElementById("dob");
var address=document.getElementById("address");
var password=document.getElementById("password");

function submitClick()
{
	var firebaseRef=firebase.database().ref();
	firebaseRef.child("Text").set("hi");
	alert("hi");
}
