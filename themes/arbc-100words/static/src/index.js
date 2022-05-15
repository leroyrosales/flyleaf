import './main.css';

"use strict";

const mobileMenu = document.getElementById('mobile-menu');
const openMobileMenu = document.getElementById('open-mobile-menu');
const closedNavIcon = document.getElementById('closed-nav-icon');
const openNavIcon = document.getElementById('open-nav-icon');

openMobileMenu.addEventListener( 'click', () => {
  if( mobileMenu.classList.contains( 'hidden' ) && (window.innerWidth < 639) ) {
    mobileMenu.classList.remove( 'hidden' );
    closedNavIcon.classList.add('hidden');
    openNavIcon.classList.remove('hidden');
  } else {
    mobileMenu.classList.add( 'hidden' );
    closedNavIcon.classList.remove('hidden');
    openNavIcon.classList.add('hidden');
  }
});

window.addEventListener('resize', () => {
  if ( window.innerWidth > 639 ) {
    mobileMenu.classList.add( 'hidden' );
  }
});




