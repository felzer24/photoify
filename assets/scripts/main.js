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

// Edit Post Overlays
const [...editPostOverlays] = document.querySelectorAll('.edit-post-overlay');
const [...updateFileInputs] = document.querySelectorAll('.update-file-input');
const [...editPostButtons] = document.querySelectorAll('.btn-post-edit');
const [...postOverlaysClose] = document.querySelectorAll('.post-close-overlay-btns');
// const [...updateFileLabels] = document.querySelectorAll('.update-file-label');

// Manage likes on posts
const [...actionLikeBtns] = document.querySelectorAll('.action-btn-likes');

// Code do not edit

// actionLikeBtns.forEach((actionLikeBtn) => {
//     actionLikeBtn.addEventListener('click', (e) => {
//         e.preventDefault();
//         console.log(actionLikeBtn);
//     });
// });

editPostButtons.forEach((editPostButton) => {
    editPostButton.addEventListener('click', () =>{
        let postId = editPostButton.dataset.id;
        document.getElementById(`${postId}`).classList.add('d-flex');
    });
});

postOverlaysClose.forEach((postOverlayClose) => {
    postOverlayClose.addEventListener('click', () => {
        postOverlayClose.offsetParent.classList.remove('d-flex');
    });
});

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

updateFileInputs.forEach((updateFileInput) => {
    updateFileInput.addEventListener('change', () => {
        if (updateFileInput.value != "") {
            updateFileInput.labels[0].previousElementSibling.children[0].textContent = updateFileInput.files[0].name;
        };
    });
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
