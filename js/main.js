

// Funktion för att visa/dölja menyn
var categoriesButton = document.getElementById('cat-butt');
categoriesButton.addEventListener('click', swipeMenu);

var categories = document.getElementById('categories');

var toggle = true;

// var menuSize = '100%';
// var menuPosition = '-100%';

// if (window.innerWidth < '900') {
// 	menuSize = '20%';
// 	menuPosition = '-20%';
// 	categories.style.width = '20%';
// 	categories.style.right = '-20%';
// } else {
// 	var menuSize = '-100%';
// 	menuPosition = '0';
// 	categories.style.width = '100%';
// 	categories.style.right = '-100%';
// }

function swipeMenu() {
	if (toggle === true) {
		categories.style.right = '0';
		categoriesButton.style.webkitTransform = 'rotate(90deg)';
		toggle = false;
	} else {
		categories.style.right = '-100%';
		categoriesButton.style.webkitTransform = 'rotate(0deg)';
		toggle = true;
	}
}
// Visa/dölja funktion slut