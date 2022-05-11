var toggle = document.querySelector('.menu__top__icon__toggle'),
    sidebar = document.querySelector('.menu__top__main__menu');

toggle.addEventListener('click', function(e) {
    sidebar.classList.toggle('menu__top__main__menu__show');
});
