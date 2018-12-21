'use strict';

console.log('Hello World');

const editToggleOverlay = document.getElementById('edit-toggle-overlay');
const secondColumnDisplay = document.getElementById('second-column');

const editCloseOverlayBtn = document.getElementById('edit-close-overlay-btn');
const editAccountOverlayBtn = document.getElementById('edit-account');
const deleteAccountOverlayBtn = document.getElementById('delete-account');

editAccountOverlayBtn.addEventListener('click', () => {
    editToggleOverlay.classList.add('overlay-display');
    secondColumnDisplay.classList.add('d-none');
});

editCloseOverlayBtn.addEventListener('click', () => {
    editToggleOverlay.classList.remove('overlay-display');
    secondColumnDisplay.classList.remove('d-none');
    window.scrollTo(0, 0);
});
