document.addEventListener('DOMContentLoaded', e => {
  // jQuery functions
  jQuery(function($){
    $('.f-slides').slick({
      infinite: true,
      slidesToShow: 3,
      prevArrow: '<div class="slider-arrow f-prev"><img src="' + location.origin + '/wp-content/themes/cntech/img/slider-arrow.png" alt="arrow"></div>',
      nextArrow: '<div class="slider-arrow f-next"><img src="' + location.origin + '/wp-content/themes/cntech/img/slider-arrow.png" alt="arrow"></div>'
    });
  });

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
      const url = window.innerWidth > 500 ? block.dataset.src : block.dataset.srcMobile ? block.dataset.srcMobile : block.dataset.src;
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

  // Add file to form
  (function(){
    const button = document.querySelector('.file-block');
    const input = button.querySelector('input[type=file]');
    const fileName = document.querySelector('.file-name');

    button.addEventListener('click', e => {
      input.click();
    });
    input.addEventListener('change', e => {
      let res = input.value.split('\\');
      fileName.textContent = res[res.length-1];
    })
  })();

  // Slider on gallery
  (function(){
    const slide = [...document.querySelectorAll('.f-slide')];
    const mainImgBlockRem = [...document.querySelectorAll('.galery-block__main')];
    function clickBlock(e){
      document.querySelector('#img-popup img').setAttribute('src', e.target.getAttribute('src'));
      jQuery.magnificPopup.open({
        items: {
          src: '#img-popup'
        },
        type: 'inline'
      }, 0);
    }
    mainImgBlockRem.forEach(el => el.addEventListener('click', clickBlock, false));
    slide.forEach(item => {
      item.addEventListener('click', e => {
        const mainImgBlock = item.closest('.galery-block').querySelector('.galery-block__main');
        mainImgBlock.removeEventListener('click', clickBlock, false);
        mainImgBlock.dataset.video = item.dataset.video;
        const mainImg = mainImgBlock.querySelector('img');
        mainImg.setAttribute('src', item.dataset.src);
        if(item.classList.contains('f-video')) {
          mainImgBlock.classList.add('f-video');
        }else {
          mainImgBlock.classList.remove('f-video');
        }
        mainImgBlock.addEventListener('click', e => {
          if(mainImgBlock.classList.contains('f-video')) {
            document.querySelector('#video-popup iframe').setAttribute('src', mainImgBlock.dataset.video);
            jQuery.magnificPopup.open({
              items: {
                src: '#video-popup'
              },
              type: 'inline'
            }, 0);
          }else {
              document.querySelector('#img-popup img').setAttribute('src', mainImgBlock.querySelector('img').getAttribute('src'));
              jQuery.magnificPopup.open({
                items: {
                  src: '#img-popup'
                },
                type: 'inline'
              }, 0);
          }
        });
      });
    });
  })();

  // Change iframe height
  chengeIframeHeight();
  function chengeIframeHeight(){
    if(window.innerWidth < 1280) {
      const iframe = document.querySelector('#video-popup iframe');
      const height = Math.floor(window.innerWidth/1.777777777777777777777777);

      iframe.style.height = height + 'px';
    }
  }

  // Change position Card title on mobile
  (function(){
    if(document.querySelectorAll('.mobile-title').length) {
      const mobileTitle = document.querySelector('.mobile-title');
      const desctopTitle = document.querySelector('.desctop-title');

      if(window.innerWidth < 1100) mobileTitle.appendChild(desctopTitle);
    }
  })();

  // Open tabs
  (function(){
    const tabNames = [...document.querySelectorAll('.tab-name')];

    tabNames.forEach(tabName => {
      tabName.addEventListener('click', e => tabName.closest('.tab-parent').classList.toggle('tab-opened'));
    });
  })();

  // Change text
  (function(){
    const allItems = [...document.querySelectorAll('.pieses-shet')];
    allItems.forEach(block => {
      const array = block.textContent.trim().split(' ');
      const newArray = array.map(el => isNaN(parseInt(el, 10)) ? `<span>${el}</span>` : el);
      block.innerHTML = newArray.join(' ');
    });
  })();

});

