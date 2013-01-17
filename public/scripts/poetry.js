function linecol(){ // This function changes all of the lines to black and then the line selected via the option menu in the form is made red. The loop is done with subtraction rather than addition to offset the fact that position 0 in the array is equal to line number one and so on.
	elm = document.getElementsByClassName('line');
	for (var i = 1; i <= elm.length; i++) {
		elm[i-1].style.color="black";
	};
	elm[document.getElementById("linebox").value-1].style.color="red";
}

function underline(number){ // This function runs through the array to remove the underline style on them and all of the divs. The selected line is underlined and corresponding div is then displayed.
	elm = document.getElementsByClassName('line');
	document.getElementById('comment0').style.display="none";
	
	for (var i = 1; i <= elm.length; i++) {
		elm[i-1].style.textDecoration="none";
		document.getElementById('comment'+ i).style.display="none";
	};

	elm[number-1].style.textDecoration="underline";
	document.getElementById('comment'+ number).style.display="inline";
}