import './main.css';

"use strict";

// const header = document.getElementById('header');
// const firstSection = document.querySelector('main section');
// header.style.backgroundColor = window.getComputedStyle(firstSection).backgroundColor;

// const categoryMenu = document.querySelector( '[data-category-menu]' );
const openMobileMenu = document.querySelector( '[data-mobile-menu-open]' );
const closeMobileMenu = document.querySelector( '[data-mobile-menu-close]' );
const mobileNav = document.querySelector( '[data-mobile-nav]' );
const desktopNav = document.getElementById( 'navbar' );

// document.addEventListener( 'click', function (e) {

// 	if ( e.target.matches( '[data-menu-btn]' ) ) {
// 		//categoryMenu.classList.toggle( 'hidden' );
// 	}

// }, false);

openMobileMenu.addEventListener( 'click', () => {
	//mobileNav.classList.toggle( 'hidden' );
	mobileNav.style.display = mobileNav.style.display === 'none' ? '' : 'none';
	desktopNav.style.display = 'none';
});

closeMobileMenu.addEventListener( 'click', () => {
	//mobileNav.classList.toggle( 'hidden' );
	mobileNav.style.display = mobileNav.style.display === 'none' ? '' : 'none';
	desktopNav.style.display = 'flex';
});

// Filtering categories
const categoryMenu = document.querySelector( '[data-category-menu]' );

document.addEventListener( 'click', function (e) {

	if ( e.target.matches( '[data-menu-btn]' ) ) {
		categoryMenu.classList.toggle( 'hidden' );
	}

	// if ( e.target.matches( '[data-close-btn]' ) ) {
	// 	mobileNav.style.display = mobileNav.style.display === 'none' ? '' : 'none';
	// 	desktopNav.style.display = 'flex';
	// }

	// if ( e.target.matches( '[data-mobile-menu]' ) ) {
	// 	mobileNav.style.display = mobileNav.style.display === 'none' ? '' : 'none';
	// 	desktopNav.style.display = 'none';
	// }

}, false);
