const menuBtn = document.querySelector('.menu-btn');
const menu = document.querySelector('.top-menu');
const hasChild = document.querySelectorAll('.main-menu > li.has-child > a');

if(menuBtn !== null) {
    menuBtn.addEventListener('click', (e) => {
        e.preventDefault();
        menuBtn.classList.toggle('active');
        menu.classList.toggle('active');
    });   
}

if(hasChild !== null && window.matchMedia('(max-width: 1024px)').matches) {
    for (let i = 0; i < hasChild.length; i++) {
        hasChild[i].addEventListener('click', (e) => {
            e.preventDefault();
            for (let j = 0; j < hasChild.length; j++) {
                if (j !== i) {
                    hasChild[j].parentNode.classList.remove('active');
                }
            }
            e.target.parentNode.classList.toggle('active');
        });
    }
}

function closeMenu() {
    menuBtn.classList.remove('active');
    menu.classList.remove('active');
}