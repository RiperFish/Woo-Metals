
// search bar manipulation
const search__icon = document.querySelector('.nav_search_icon');
const mobile_search_icon = document.querySelector('.search_icon-mobile');
const header__top_search = document.querySelector('.header__top-search');
const header__search = document.querySelector('.header__search');
const search__close = document.querySelector('.search__close');
search__icon.addEventListener('click', () => {
    header__top_search.classList.toggle("show_search-bar");
});
mobile_search_icon.addEventListener('click', () => {
    header__top_search.classList.toggle("show_search-bar");
});
/* search__close.addEventListener('click', () => {
    header__top_search.classList.remove("show_search-bar");
}); */


/* $(document).click(function (event) {
    if (!$(event.target).closest(".header__top-search,.nav_search_icon,.search_icon-mobile").length) {
        $("body").find(".header__top-search").removeClass("show_search-bar");
    }
}); */

/* SIDE MENU */
const menu_toggle = document.querySelector('.menu-toggle');
const body = document.querySelector('body');
const header__menu_wrapper = document.querySelector('body');
menu_toggle.addEventListener('click', () => {
    console.log("rrr");
    header__menu_wrapper.classList.toggle("open");
    body.classList.toggle("noscroll");
});


// hamburger
/* const hamburger = document.querySelector('.header__humbergermenu');
const menu = document.querySelector('.menu');
const main__content = document.querySelector('.main__content'); */
/* const close_ham = document.querySelector('.close__ham');
const menu_items = document.querySelectorAll('.header__menu-item');
const body = document.querySelector('body'); */

/* hamburger.addEventListener('click',()=> {
    menu.classList.toggle("open_menu");
    main__content.classList.toggle("push_content"); */
    //body.classList.toggle("noscroll");
//});

/* close_ham.addEventListener('click',()=> {
    menu.classList.remove("header__menu-open");
    body.classList.remove("noscroll");
}); */