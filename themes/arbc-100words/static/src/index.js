import './main.css';

"use strict";

const header = document.getElementById('header');
const firstSection = document.querySelector('main section');
header.style.backgroundColor = window.getComputedStyle(firstSection).backgroundColor;

const categoryFilter = document.getElementById('category-filter');

categoryFilter.addEventListener( 'click', (e) => 
    e.target.nextSibling.nextSibling.classList.toggle('hidden')
);

const storyCategories = document.querySelectorAll('[data-category]');

for( let i = 0; i < storyCategories.length; i++ ) {
    storyCategories[i].addEventListener('click', () => {
        console.log( storyCategories[i].dataset.category )
    })
}
