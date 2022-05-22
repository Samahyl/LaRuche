/*Variables*/
var clicked = false;
var codeBlock = "<a>ADD test</a>";
var tag = document.createElement("p");
var element = document.getElementById("l_panel");

/*Init*/
document.getElementById("all_actu").style.visibility = "hidden";

/*Functions*/
function alert_suppr() {
	alert("Voulez-vous vraiment supprimer?\nCette action est irréversible!");
};

function actusAff() {
	if (clicked == false) {
		document.getElementById("all_actu").style.visibility = "visible";
		clicked = true;
	} else {
		document.getElementById("all_actu").style.visibility = "hidden";
		clicked = false;
	}
};

function addRes() {
	//alert("test");
	//document.getElementById("plusbtn").style.visibility = "hidden";
	element.appendChild(para);

	//https://www.w3schools.com/js/tryit.asp?filename=tryjs_dom_elementcreate

};