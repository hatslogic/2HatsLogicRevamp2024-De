const menuBtn = document.querySelector('.menu-btn');
const menu = document.querySelector('.top-menu');
const hasChild = document.querySelector('.main-menu .has-child');

menuBtn.addEventListener('click', () => {
    menuBtn.classList.toggle('active');
    menu.classList.toggle('active');
});

hasChild.addEventListener('click', (e) => {
    e.target.parentNode.classList.toggle('active');
});

function closeMenu() {
    menuBtn.classList.remove('active');
    menu.classList.remove('active');
}