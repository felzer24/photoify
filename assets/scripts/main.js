'use strict';

const mainErrorCheck = document.querySelector('main');

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

// Filename for profile file-input
const profileInputFile = document.querySelector('.profile-input-file');
const filenameProfile = document.querySelector('.filename-profile');

// Filename for post file-input
const postFilename = document.querySelector('.post-filename');
const myfileInput = document.querySelector('.myfile-input');

// Code do not edit

const showAccountOverlay = () => {
    editToggleOverlay.classList.add('overlay-display');
    mobileMenu.style.pointerEvents = "none";
    secondColumn.classList.add('d-none');
}

profileInputFile.addEventListener('change', () => {
    if (profileInputFile.value != "") {
        filenameProfile.children[0].textContent = profileInputFile.files[0].name;
    }
});

myfileInput.addEventListener('change', () => {
    if (myfileInput.value != "") {
        postFilename.children[0].textContent = myfileInput.files[0].name;
    }
});

mobileMenu.addEventListener('click', () => {
    firstColumn.classList.toggle('mb-3');
    secondColumn.classList.remove('d-none');
    wrapperFirstColumn.classList.toggle('d-block');
    postModuleBorderRadius.classList.toggle('border-top__toggle');
});

if (mainErrorCheck.dataset.errors === 'yes'){
    showAccountOverlay();
}

editAccountOverlayBtn.addEventListener('click', () => {
    showAccountOverlay();
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
