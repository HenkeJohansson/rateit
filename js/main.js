

// Funktion för att visa/dölja menyn
var categoriesButton = document.getElementById('cat-butt');
categoriesButton.addEventListener('click', swipeMenu);

var categories = document.getElementById('categories');

var toggle = true;

var menuSize = '100%';
var menuPosition = '-100%';

// testar media-querys i js
var media = window.matchMedia('(min-width: 800px)');

media.addListener(function(data) {
	console.log('matches: ' + data.matches);
});

var isiPad = navigator.userAgent.match(/iPad/i) != null;

function swipeMenu() {

	if (isiPad == true) {
		menuSize = '25%';
		menuPosition = '-25%';
		categories.style.width = '25%';
		categories.style.right = '-25%';
	}

	// Sätter bredden på #categories beroende på fönstrets bredd
	if (window.innerWidth > '480') {
		menuSize = '30%';
		menuPosition = '-30%';
		categories.style.width = '30%';
		categories.style.right = '-30%';

	} else if(window.innerWidth > '768') {
		menuSize = '25%';
		menuPosition = '-25%';
		categories.style.width = '25%';
		categories.style.right = '-25%';

	} else {
		menuSize = '-100%';
		menuPosition = '-100%';
		categories.style.width = '100%';
		categories.style.right = '-100%';
	}
	// Funktionen för att visa menyn och sedan gömma den igen
	if (toggle === true) {
		categories.style.right = '0';
		categoriesButton.style.webkitTransform = 'rotate(90deg)';
		toggle = false;

	} else {
		categories.style.right = menuPosition;
		categoriesButton.style.webkitTransform = 'rotate(0deg)';
		toggle = true;
	}
}
// Visa/dölja funktion slut