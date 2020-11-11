document.addEventListener('DOMContentLoaded', e => {
  // jQuery functions
  try{
    jQuery(function($){
      $('.f-slides').slick({
        infinite: true,
        slidesToShow: 3,
        prevArrow: '<div class="slider-arrow f-prev"><img src="' + location.origin + '/wp-content/themes/cntech/img/slider-arrow.png" alt="arrow"></div>',
        nextArrow: '<div class="slider-arrow f-next"><img src="' + location.origin + '/wp-content/themes/cntech/img/slider-arrow.png" alt="arrow"></div>'
      });
      $('.open-contact-form').magnificPopup({
        items: {
          src: '#contacts-popup',
          type: 'inline'
        }
      });
      $('.open-request-popup').magnificPopup({
        items: {
          src: '#request-popup',
          type: 'inline'
        }
      });
    });
  }catch(err){
    console.log(err);
  }


  // Header on scroll
  try{
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
  }catch(err){
    console.log(err);
  }


  // Open search form
  try{
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
  }catch(err){
    console.log(err);
  }


  //Open mobile menu and click anchor link
  try{
    (function(){
      const button = document.querySelector('.open-menu');
      const topLine = document.querySelector('.top-line');
      const lis = [...document.querySelectorAll('.top-line li')];

      button.addEventListener('click', e => {
        button.classList.toggle('opened');
        topLine.classList.toggle('opened');
        document.body.classList.toggle('mobile-menu-opened');
      });

      lis.forEach(li => {
        li.addEventListener('click', e => {
          topLine.classList.remove('opened');
          button.classList.remove('opened');
          document.body.classList.remove('mobile-menu-opened');
        });
      });
    })();
  }catch(err){
    console.log(err);
  }


  // Set background image
  try{
    (function(){
      function changeBg(tag){
        const block = document.querySelector(tag);
        const url = window.innerWidth > 500 ? block.dataset.src : block.dataset.srcMobile ? block.dataset.srcMobile : block.dataset.src;
        block.setAttribute('style', `background-image: url(${url})`)
      }


      if(document.querySelectorAll('.main-page').length){
        document.addEventListener('scroll', e => {
          if(window.scrollY > 400) changeBg('.main-tech');
        });
      }
      // document.addEventListener('DOMContentLoaded', e => {
        window.addEventListener('scroll', e => {
          if(window.scrollY > 9) changeBg('header.site-header');;
        });
        setTimeout(function(){
          window.scrollTo(0, 10);
        }, 2500)
      // });

    })();
  }catch(err){
    console.log(err);
  }


  // Scroll to anchore
  try{
    (function(){
      const anchors = [...document.querySelectorAll('a[href*="#"]')];
      anchors.forEach(anchor => {
        anchor.addEventListener('click', e => {
          if(document.querySelectorAll('.main-page').length){
            e.preventDefault()
          }

          const blockID = anchor.getAttribute('href').substring(2);

          window.scrollTo({
            top: getOffsetSum(document.getElementById(blockID)) - 100,
            behavior: "smooth"
          });
        });
      });
      if(location.hash){
        var myHash = location.hash; //получаем значение хеша
        location.hash = ''; //очищаем хеш
        setTimeout(function(){
          window.scrollTo({
            top: getOffsetSum(document.querySelector(myHash)) - 100,
            behavior: "smooth"
          });
        },500);
      }
      function getOffsetSum(elem) {
        let top = 0;
        while(elem) {
            top = top + parseFloat(elem.offsetTop)
            elem = elem.offsetParent
        }

        return Math.round(top);
      }

    })();
  }catch(err){
    console.log(err);
  }



  // Add file to form
  try{
    (function(){
      const buttons = [...document.querySelectorAll('.file-block')];
      buttons.forEach(button => {
        const input = button.querySelector('input[type=file]');
        const fileName = button.querySelector('.file-name');

        button.addEventListener('click', e => {
          input.click();
        });
        input.addEventListener('change', function(){
          const fileList = this.files;
          console.log(fileList);
          // console.log(input.files[0].name);
          // console.log(button.querySelector('input[type=file]').value);
          // fileName.textContent = input.files[0].name;
          var text = document.createTextNode(fileList[0].name);
          fileName.appendChild(text);
          console.log(button.querySelector('input[type=file]').value);
        })
      });
    })();
  }catch(err){
    console.log(err);
  }


  // Slider on gallery
  try{
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
              let url =  mainImgBlock.dataset.video;
              url = url.replace(/watch\?v=/, 'embed/');
              document.querySelector('#video-popup iframe').setAttribute('src', url);
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
  }catch(err){
    console.log(err);
  }


  // Before submit
  try{
    (function(){
      const button = document.querySelector('.footer-form input[type=submit]');
      const checkbox = document.querySelector('.footer-form input[type=checkbox]');
      button.addEventListener('click', e => {
        if(checkbox.checked) {

        }else{
          e.preventDefault();
          jQuery.magnificPopup.open({
            items: {
              src: '#error-popup'
            },
            type: 'inline'
          }, 0);
        }
      });
    })();
  }catch(e){console.log(e);}

  // Change position Card title on mobile
  try{
    (function(){
      if(document.querySelectorAll('.mobile-title').length) {
        const mobileTitle = document.querySelector('.mobile-title');
        const desctopTitle = document.querySelector('.desctop-title');

        if(window.innerWidth < 1100) mobileTitle.appendChild(desctopTitle);
      }
    })();
  }catch(err){
    console.log(err);
  }


  // Open tabs
  try{
    (function(){
      const tabNames = [...document.querySelectorAll('.tab-name')];

      tabNames.forEach(tabName => {
        tabName.addEventListener('click', e => tabName.closest('.tab-parent').classList.toggle('tab-opened'));
      });
    })();
  }catch(err){
    console.log(err);
  }


  // Change text
  try{
    (function(){
      const allItems = [...document.querySelectorAll('.pieses-shet')];
      allItems.forEach(block => {
        const array = block.textContent.trim().split(' ');
        const newArray = array.map(el => isNaN(parseInt(el, 10)) ? `<span>${el}</span>` : el);
        block.innerHTML = newArray.join(' ');
      });
    })();
  }catch(err){
    console.log(err);
  }


  //Fake select in contact form
  try{
    (function(){
      const select = document.querySelector('#request-popup select');
      const parentSelect = select.parentElement;
      const fakeSelect = document.createElement('div');
      const selectTitle = document.createElement('div');
      const subSelect = document.createElement('div');
      const loginField = document.querySelector('.login-field');

      fakeSelect.classList.add('fake-select');
      selectTitle.classList.add('select-title');
      subSelect.classList.add('sub-select');

      selectTitle.textContent = 'Месенджер для связи';

      const optionsArr = [...select.options].filter(el => el.value);
      optionsArr.forEach(option => {
        const div = document.createElement('div');
        div.textContent = option.value;
        subSelect.appendChild(div);
        div.addEventListener('click', e => {
          select.value = div.textContent;
          fakeSelect.classList.remove('open-select');
          selectTitle.textContent = div.textContent;
          loginField.classList.remove('lf');
          loginField.setAttribute('placeholder', `Логин в ${div.textContent}`)
        });
      });

      fakeSelect.appendChild(selectTitle);
      fakeSelect.appendChild(subSelect);

      parentSelect.insertAdjacentElement('beforebegin', fakeSelect);

      selectTitle.addEventListener('click', e => {
        fakeSelect.classList.toggle('open-select');
      });

    })();
  }catch(err){
    console.log(err);
  }

  //Remove <br> from CF7
  try{
    (function(){
      const brs = [...document.querySelectorAll('form br')].forEach(br => br.remove());
    })();
  }catch(err){
    console.log(err);
  }

  // Add product name to CF7
  try{
    (function(){
      const input = document.querySelector('.request-name');
      const mainButton = document.querySelector('.send-request-main');
      const popularButtons = [...document.querySelectorAll('.send-request-popular')];

      popularButtons.forEach(button => {
        button.addEventListener('click', e => {
          input.value = button.closest('.popular-item').querySelector('.popular-item__title').textContent;
        });
      });
      mainButton.addEventListener('click', e => {
        const name = document.querySelector('h1');
        input.value = name.textContent;
      });
    })();
  }catch(err){console.log(err);}

  //Add star to required fields
  try{
    (function(){
      const allRequired = [...document.querySelectorAll('.wpcf7-validates-as-required')];
      allRequired.forEach(el => el.parentNode.classList.add('required-span'));
    })();
  }catch(e){
    console.log(e);
  }

  // Move gallery
  try{
    (function(){
      const container = document.querySelector('.f-gallery');
      const gallery = document.querySelector('.wp-block-envira-envira-gallery');
      container.appendChild(gallery);
    })();
  }catch(e){console.log(e)}


  // Lazy load
  try{
    (function(){
      function lazyBg(tag){
        [...document.querySelectorAll(tag)].forEach(el => {
          el.setAttribute('style', `background-image: url(${el.dataset.src});`);
        });
      }
      function lazyImg(tag){
        [...document.querySelectorAll(tag)].forEach(el => {
          el.setAttribute('src', el.dataset.src);
        });
      }
      document.addEventListener('scroll', e => {
        console.log(window.scrollY);
        if(window.scrollY > 200) {
          lazyBg('.main-categry-item');
          lazyImg('.main-control__img img');
          lazyImg('img.main-delivery__img');
          lazyImg('.banner-left img');
          lazyImg('.banner-right img');
          lazyImg('.main-parts-left img');
          lazyImg('.main-parts-right img');
        }
      });
    })();
  }catch(e){console.log(e)}

});

