import './main.css';

"use strict";

// const header = document.getElementById('header');
// const firstSection = document.querySelector('main section');
// header.style.backgroundColor = window.getComputedStyle(firstSection).backgroundColor;

const categoryMenu = document.querySelector( '[data-category-menu]' );

document.addEventListener( 'click', function (e) {

	if ( e.target.matches( '[data-menu-btn]' ) ) {
		categoryMenu.classList.toggle( 'hidden' );
	}

}, false);
