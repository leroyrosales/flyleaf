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

const sliders = document.querySelectorAll('.swiper-wrapper');

sliders.forEach( slider => {

  const slides = slider.querySelectorAll('.swiper-slide');
  const intervalTime = 5000;
  let slideInterval;

  const nextSlide = () => {
    // Get current class
    const current = slider.querySelector('.current');
    // Remove current class
    current.classList.remove('current');
    // Check for next slide
    if (current.nextElementSibling) {
      // Add current to next sibling
      current.nextElementSibling.classList.add('current');
    } else {
      // Add current to start
      slides[0].classList.add('current');
    }
    setTimeout(() => current.classList.remove('current'));
  };

  slides.forEach( slide => {
    slide.addEventListener('click', () => {
      nextSlide();
    })
  });

});



