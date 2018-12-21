'use strict';

const editToggleOverlay = document.getElementById('edit-toggle-overlay');
const secondColumnDisplay = document.getElementById('second-column');

const editCloseOverlayBtn = document.getElementById('edit-close-overlay-btn');
const editAccountOverlayBtn = document.getElementById('edit-account');
const deleteAccountOverlayBtn = document.getElementById('delete-account');

const textAreasPrevent = document.querySelectorAll('textarea');

editAccountOverlayBtn.addEventListener('click', () => {
    editToggleOverlay.classList.add('overlay-display');
    secondColumnDisplay.classList.add('d-none');
});

editCloseOverlayBtn.addEventListener('click', () => {
    editToggleOverlay.classList.remove('overlay-display');
    secondColumnDisplay.classList.remove('d-none');
    window.scrollTo(0, 0);
});

[...textAreasPrevent].forEach((textAreaPrevent) => {
    textAreaPrevent.addEventListener('keydown', (e) =>{
        if(e.which === 13){
            e.preventDefault();
        }
    });
});
