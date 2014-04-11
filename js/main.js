

// Funktion för att visa/dölja menyn
var categoriesButton = document.getElementById('cat-butt');
categoriesButton.addEventListener('click', swipeMenu);

var categories = document.getElementById('categories');

var toggle = true;


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