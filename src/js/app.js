// Header on scroll
(function(){
  const topLine = document.querySelector('.top-line');
  const middleLine = document.querySelector('.middle-line');

  document.addEventListener('scroll', e => {
    if(window.scrollY > 50) {
      topLine.classList.add('scrolled');
      if(window.innerWidth < 900) middleLine.classList.add('scrolled');
    }
    else {
      topLine.classList.remove('scrolled');
      if(window.innerWidth < 900) middleLine.classList.remove('scrolled');
    }
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

//Open mobile menu and click anchor link
(function(){
  const button = document.querySelector('.open-menu');
  const topLine = document.querySelector('.top-line');
  const lis = [...document.querySelectorAll('.top-line li')];

  button.addEventListener('click', e => {
    button.classList.toggle('opened');
    topLine.classList.toggle('opened');
  });

  lis.forEach(li => {
    li.addEventListener('click', e => {
      topLine.classList.remove('opened');
      button.classList.remove('opened');
    });
  });
})();

// Set background image
(function(){
  function changeBg(tag){
    const block = document.querySelector(tag);
    const url = window.innerWidth > 500 ? block.dataset.src : block.dataset.srcMobile;
    block.setAttribute('style', `background-image: url(${url})`)
  }

  changeBg('header.site-header');
  if(document.querySelectorAll('.main-page').length){
    changeBg('.main-tech');
  }

})();

// Scroll to anchore
(function(){
  const anchors = [...document.querySelectorAll('a[href*="#"]')];
  anchors.forEach(anchor => {
    anchor.addEventListener('click', e => {
      if(document.querySelectorAll('.main-page').length){
        e.preventDefault()
      }

      const blockID = anchor.getAttribute('href').substring(2);

      document.getElementById(blockID).scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    });
  });
})();