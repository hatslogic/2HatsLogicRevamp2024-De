const menuBtn = document.querySelector('.menu-btn');
const menu = document.querySelector('.top-menu');
const hasChild = document.querySelector('.main-menu > li.has-child > a');

if(menuBtn !== null) {
    menuBtn.addEventListener('click', (e) => {
        e.preventDefault();
        menuBtn.classList.toggle('active');
        menu.classList.toggle('active');
    });   
}

if(hasChild !== null && window.matchMedia('(max-width: 1024px)').matches) {
    hasChild.addEventListener('click', (e) => {
        e.preventDefault();
        e.target.parentNode.classList.toggle('active');
    });
}

function closeMenu() {
    menuBtn.classList.remove('active');
    menu.classList.remove('active');
}