// Header on scroll
(function(){
  const topLine = document.querySelector('.top-line');
  const middleLine = document.querySelector('.middle-line');

  document.addEventListener('scroll', e => {
    if(window.scrollY > 50) { topLine.classList.add('scrolled'); middleLine.classList.add('scrolled'); }
    else { topLine.classList.remove('scrolled'); middleLine.classList.remove('scrolled'); }
  });
})();

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

//Open mobile menu
(function(){
  const button = document.querySelector('.open-menu');
  const topLine = document.querySelector('.top-line');

  button.addEventListener('click', e => {
    button.classList.toggle('opened');
    topLine.classList.toggle('opened');
  });
})();

// Set header backgroun image
(function(){
  const header = document.querySelector('header.site-header');
  const url = window.innerWidth > 500 ? header.dataset.src : header.dataset.srcMobile;
  header.setAttribute('style', `background-image: url(${url})`)
})();

