import './main.css';

"use strict";

// const header = document.getElementById('header');
// const firstSection = document.querySelector('main section');
// header.style.backgroundColor = window.getComputedStyle(firstSection).backgroundColor;

const categoryFilter = document.getElementById('category-filter');

categoryFilter.addEventListener( 'click', (e) =>
    e.target.nextSibling.nextSibling.classList.toggle('hidden')
);

document.addEventListener( 'click', function (e) {

	if ( e.target.matches( '[data-category]' ) ) {
		console.log(e.target.dataset.category);
	}

}, false);
