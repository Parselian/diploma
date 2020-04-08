'use-strict';
document.addEventListener('DOMContentLoaded', () => {

  /* Slider */
  const slider = (wrap, items, sliderDots) => {
    const sliderWrap = document.querySelector(wrap),
          slides = sliderWrap.querySelectorAll(items),
          sliderControls = document.querySelector(sliderDots);
    let counter = 0,
        intervalId;

    const createDots = () => {
      for( let i = 0; i < slides.length; i++ ) {
        const dot = document.createElement('li');
        dot.className = 'slider-dots__dot';
        if( i === 0 ) {
          dot.classList.add('slider-dots__dot_active');
        }

        sliderControls.insertAdjacentElement('beforeend', dot);
      }

    };
    createDots();

    const allDots = sliderControls.querySelectorAll('.slider-dots__dot');

    const toggleDots = (target) => {
      allDots.forEach((item, i) => {
        item.classList.remove('slider-dots__dot_active');

        if (item === target) {
          item.classList.add('slider-dots__dot_active');
          counter = i;
        }
      });
    };

    const startSlider = () => {
      slides[counter].classList.remove('slider-slide_active');
      allDots[counter].classList.remove('slider-dots__dot_active');

      counter++;

      if( counter > slides.length - 1 ) {
        counter = 0;
      } else if( counter < 0 ) {
        counter = slides.length - 1;
      }

      slides[counter].classList.add('slider-slide_active');
      allDots[counter].classList.add('slider-dots__dot_active');
    };

    intervalId = setInterval(startSlider, 3000);

    sliderControls.addEventListener('mouseover', (e) => {
      clearInterval(intervalId);
    });

    sliderControls.addEventListener('mouseout', (e) => {
      intervalId = setInterval(startSlider, 3000);
    });

    const toggleSlides = () => {
      sliderControls.addEventListener('click', (e) => {
        const target = e.target;

        slides[counter].classList.remove('slider-slide_active');
        allDots[counter].classList.remove('slider-dots__dot_active');

        if( target.matches('.slider__arrow_next') ) {
          counter++;
        } else if( target.matches('.slider__arrow_prev') ) {
          counter--;
        } else if( target.matches('.slider-dots__dot') ) {
          toggleDots(target);
        }

        if( counter > slides.length - 1 ) {
          counter = 0;
        } else if( counter < 0 ) {
          counter = slides.length - 1;
        }

        slides[counter].classList.add('slider-slide_active');
        allDots[counter].classList.add('slider-dots__dot_active');
      });
    };  
    toggleSlides();
  };
  slider('.slider-wrap', '.slider-slide', '.slider-dots');

  /* Toggle burger-menu */
  const toggleBurger = (elem, elem2) => {
    const burgerBtn = document.getElementById(elem),
          menu = document.querySelector('.burger-menu'),
          burgerMenuBtn = document.getElementById(elem2);

    burgerBtn.addEventListener('click', (e) => {
      burgerBtn.classList.toggle('active');
      menu.classList.add('burger-visible');
      burgerMenuBtn.classList.toggle('active');
    })

    burgerMenuBtn.addEventListener('click', (e) => {
      burgerBtn.classList.toggle('active');
      menu.classList.remove('burger-visible');
      burgerMenuBtn.classList.toggle('active');
    })
  };
  toggleBurger('burger-btn', 'burger-menu-btn');
});