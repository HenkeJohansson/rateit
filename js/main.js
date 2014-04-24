

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

function swipeMenu() {
	// Sätter bredden på #categories beroende på fönstrets bredd
	if (window.innerWidth > '550') {
		menuSize = '20%';
		menuPosition = '-20%';
		categories.style.width = '20%';
		categories.style.right = '-20%';
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