'use strict';

const form = document.querySelector('form');

form.addEventListener('submit', event => {
  event.preventDefault();

  const formData = new FormData(form);

  fetch('devlikes.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(json => console.dir(json[0].likes));
});
