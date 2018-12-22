'use strict';

// Mobile-menu
const mobileMenu = document.querySelector('.mobile-menu');
const wrapperFirstColumn = document.getElementById('wrapper-first-column');
const postModuleBorderRadius = document.querySelector('.my-post-module');

// Design Columns
const firstColumn = document.getElementById('first-column');
const secondColumn = document.getElementById('second-column');

// Manage Account Overlay
const editToggleOverlay = document.getElementById('edit-toggle-overlay');

// Buttons in Manage Account Overlay
const editCloseOverlayBtn = document.getElementById('edit-close-overlay-btn');
const editAccountOverlayBtn = document.getElementById('edit-account');

// Prevent Enter-key in textareas
const textAreasPrevent = document.querySelectorAll('textarea');

// Code do not edit

mobileMenu.addEventListener('click', () => {
    firstColumn.classList.toggle('mb-3');
    secondColumn.classList.remove('d-none');
    wrapperFirstColumn.classList.toggle('d-block');
    postModuleBorderRadius.classList.toggle('border-top__toggle');
});

editAccountOverlayBtn.addEventListener('click', () => {
    editToggleOverlay.classList.add('overlay-display');
    mobileMenu.style.pointerEvents = "none";
    secondColumn.classList.add('d-none');
});

editCloseOverlayBtn.addEventListener('click', () => {
    editToggleOverlay.classList.remove('overlay-display');
    mobileMenu.removeAttribute('style');
    secondColumn.classList.remove('d-none');
    window.scrollTo(0, 0);
});

[...textAreasPrevent].forEach((textAreaPrevent) => {
    textAreaPrevent.addEventListener('keydown', (e) =>{
        if(e.which === 13){
            e.preventDefault();
        }
    });
});
