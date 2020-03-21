'use-strict';
document.addEventListener('DOMContentLoaded', () => {

  /* Toggle burger-menu */
  const toggleBurger = (elem, elem2) => {
    const burgerBtn = document.getElementById(elem),
      menu = document.querySelector('.burger-menu'),
      burgerMenuBtn = document.getElementById(elem2);

    burgerBtn.addEventListener('click', (e) => {
      burgerBtn.classList.toggle('active');
      menu.classList.add('burger-visible');
      burgerMenuBtn.classList.toggle('active');
    });

    burgerMenuBtn.addEventListener('click', (e) => {
      burgerBtn.classList.toggle('active');
      menu.classList.remove('burger-visible');
      burgerMenuBtn.classList.toggle('active');
    })
  };
  toggleBurger('burger-btn', 'burger-menu-btn');

  /* Toggle sidebar */
  const toggleSidebar = () => {
    const sidebarWrap = document.querySelector('.main-sidebar'),
          sidebarArrow = document.querySelector('.main-sidebar__title-icon'),
          sidebarList = document.querySelector('.main-sidebar-list');

    sidebarWrap.addEventListener('click', (e) => {
      const target = e.target;

      if (target.matches('h2, .main-sidebar__title-text, .main-sidebar__title-icon')) {
        sidebarList.classList.toggle('rolled');
        sidebarArrow.classList.toggle('rotated');
      } 
    });
  };
  toggleSidebar();

  /* Toggle menu sections */
  const toggleSections = (listWrap, listLinks, sections) => {
    const menuWrap = document.querySelector(listWrap),
      menuLinks = document.querySelectorAll(listLinks),
      contentBloks = document.querySelectorAll(sections);

    const showContent = (id) => {
      contentBloks.forEach(item => {
        if (!item.classList.contains('hidden')) {
          item.classList.add('hidden');
        }
      });

      contentBloks.forEach(item => {
        let attr = item.getAttribute('id');

        if (attr === id) {
          item.classList.remove('hidden');
        }
      });
    };

    menuWrap.addEventListener('click', (e) => {
      const target = e.target;

      if (target.matches(listLinks)) {
        e.preventDefault();
        target.getAttribute('href');

        menuLinks.forEach(item => {
          if (item.classList.contains('active')) {
            item.classList.remove('active');
          }
        });

        menuLinks.forEach((item, i) => {
          if (item === target) {
            item.classList.add('active')
            showContent(target.getAttribute('href').slice(1));
          }
        });
      }
    });
  };
  toggleSections('.main-sidebar', '.main-sidebar-list__link', '.main-content');
});