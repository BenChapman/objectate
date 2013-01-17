var airman = new Array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16); // This array contains the line numbers for An Irish Airman Foresees His Death.

var oz = new Array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14); // This array contains the number of lines for Ozymandias.

var haikus = new Array(1, 2, 3); // This array contains the line numbers for Effects of Mass.

var haikus2 = new Array(4, 5, 6); // This array contains the line numbers for Lunar Clone

function linecol(){ // This function changes all of the lines to black and then the line selected via the option menu in the form is made red. The loop is done with subtraction rather than addition to offset the fact that position 0 in the array is equal to line number one and so on.

	for (var i = airman.length - 1; i >= 0; i--) {
		document.getElementById('line'+ airman[i]).style.color="black";
	};
	
	document.getElementById('line'+ document.getElementById("linebox").value).style.color="red";
}

function linecol2(){ // This function works identically to the one above except it is for Ozymandias. There are two separate functions due to the fact that the array lengths need to be different in each case.

	for (var i = oz.length - 1; i >= 0; i--) {
		document.getElementById('line'+ oz[i]).style.color="black";
	};
	
	document.getElementById('line'+ document.getElementById("linebox").value).style.color="red";

}

function underline(number){ // This function runs through the array to remove the underline style on them and all of the divs. The selected line is underlined and corresponding div is then displayed.

	for (var i = airman.length - 1; i >= 0; i--) {
		document.getElementById('line'+ airman[i]).style.textDecoration="none";
		document.getElementById('comment'+ airman[i]).style.display="none";
		document.getElementById('comment0').style.display="none";
	};

	document.getElementById('line' + number).style.textDecoration="underline";
	document.getElementById('comment' + number).style.display="inline";
}

function underline2(number){ // This function also works identically to the one above but is for Ozymandias.

	for (var i = oz.length - 1; i >= 0; i--) {
		document.getElementById('line'+ oz[i]).style.textDecoration="none";
		document.getElementById('comment'+ oz[i]).style.display="none";
		document.getElementById('comment0').style.display="none";
	};

	document.getElementById('line' + number).style.textDecoration="underline";
	document.getElementById('comment' + number).style.display="inline";
}

function hlinecol(){ // This function is for colouring the Effect of Mass haiku, identical to the ones above.

	for (var i = haikus.length - 1; i >= 0; i--) {
		document.getElementById('line'+ haikus[i]).style.color="black";
	};
	
	document.getElementById('line'+ document.getElementById("linebox").value).style.color="red";

}

function hlinecol2(){ // This function is for colouring the Lunar Clone haiku, identical to the ones above.

	for (var i = haikus2.length - 1; i >= 0; i--) {
		document.getElementById('line'+ haikus2[i]).style.color="black";
	};
	
	document.getElementById('line'+ document.getElementById("linebox2").value).style.color="red";

}

function hunderline(number){ // This function has the same purpose as the underline() function except it is for the Effect of Mass haiku.

	for (var i = haikus.length - 1; i >= 0; i--) {
		document.getElementById('line'+ haikus[i]).style.textDecoration="none";
		document.getElementById('comment'+ haikus[i]).style.display="none";
		document.getElementById('comment'+ 4).style.display="none";
		document.getElementById('comment'+ 5).style.display="none";
		document.getElementById('comment'+ 6).style.display="none";
		document.getElementById('comment0').style.display="none";
	};

	document.getElementById('line' + number).style.textDecoration="underline";
	document.getElementById('comment' + number).style.display="inline";
}

function hunderline2(number){ // This function is same as the one above except it is for the Lunar Clone haiku.

	for (var i = haikus2.length - 1; i >= 0; i--) {
		document.getElementById('line'+ haikus2[i]).style.textDecoration="none";
		document.getElementById('comment'+ haikus2[i]).style.display="none";
		document.getElementById('comment'+ 1).style.display="none";
		document.getElementById('comment'+ 2).style.display="none";
		document.getElementById('comment'+ 3).style.display="none";		
		document.getElementById('comment0').style.display="none";
	};

	document.getElementById('line' + number).style.textDecoration="underline";
	document.getElementById('comment' + number).style.display="inline";
}

function getpoem(choice){ //This function is responsible for underlining the selected uploaded poem and displaying the equivalent div on the same page. This function is written as many times as there are poems in the uploads directory.

	document.getElementById(choice + "div").style.display="inline";
	document.getElementById(choice).style.textDecoration="underline";

}