
// all the entries for attractions.php come from Database and 
// are transferred to Javascript through Javascript Object Notation (JSON) for image slider to work

var position=0;

//displays the first image for the slider and is called on body on load
function firstElementOfSlider() {
	if (picArray && picArray.length) {
		document.getElementById('img_att').src=picArray[position];
		document.getElementById('img_att').alt=picDetails[position];
		document.getElementById('img_att').title=picDetails[position];
		document.getElementById("attractionName").innerHTML= "<p><b>"+inHTML[position]+"</b></p>";
		document.getElementById("attractionLink").href=attractionLink[position];
		document.getElementById("attractionAddress").innerHTML=attractionAddress[position];
		document.getElementById("attractionDetails").innerHTML=attractionDetails[position];
		document.getElementById("bodyAttractions").style.display="block";
		document.getElementById("hiddenAttractions").style.display="none";
	}
}

//serve as action method for next button in the slide show
function nextpic(){
	if (position>=(picArray.length-1)) {
		position=-1;
	}
	position++;
	document.getElementById('img_att').src=picArray[position];
	document.getElementById('img_att').alt=picDetails[position];
	document.getElementById('img_att').title=picDetails[position];
	document.getElementById("attractionName").innerHTML= "<p><b>"+inHTML[position]+"</b></p>";
	document.getElementById("attractionLink").href=attractionLink[position];
	document.getElementById("attractionAddress").innerHTML=attractionAddress[position];
	document.getElementById("attractionDetails").innerHTML=attractionDetails[position];	
}

//serve as action method for prev button in the slide show
function prevpic(){
	var picNumber;
	if (position==0) {
		position = picArray.length;
	}
	position--;
	document.getElementById('img_att').src=picArray[position];
	document.getElementById('img_att').alt=picDetails[position];
	document.getElementById('img_att').title=picDetails[position];
	document.getElementById("attractionName").innerHTML= "<p><b>"+inHTML[position]+"</b></p>";
	document.getElementById("attractionLink").href=attractionLink[position];
	document.getElementById("attractionAddress").innerHTML=attractionAddress[position];
	document.getElementById("attractionDetails").innerHTML=attractionDetails[position];

}