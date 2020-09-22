// Open search form
(function(){
  const openButton = document.querySelector('.search-open');
  const closeButton = document.querySelector('.search-close');
  const form = document.querySelector('.top-search form');

  openButton.addEventListener('click', e => {
    form.classList.add('search-active');
    openButton.classList.remove('button-active');
    closeButton.classList.add('button-active');
    form.querySelector('input').focus();
  });

  closeButton.addEventListener('click', e => {
    form.classList.remove('search-active');
    openButton.classList.add('button-active');
    closeButton.classList.remove('button-active');
  });

  form.querySelector('.btn').addEventListener('click', e => form.submit())
})();