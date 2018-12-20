'use strict';

console.log('Hello World');

const editCloseOverlayBtn = document.getElementById('edit-close-overlay-btn');
const editToggleOverlay = document.getElementById('edit-toggle-overlay');
const editAccountOverlayBtn = document.getElementById('edit-account');

const deleteAccountOverlayBtn = document.getElementById('delete-account');

editAccountOverlayBtn.addEventListener('click', () => {
    editToggleOverlay.classList.add('overlay-display');
});

editCloseOverlayBtn.addEventListener('click', () => {
    editToggleOverlay.classList.remove('overlay-display');
});
