const body = document.querySelector('body');
const menuBtn = document.querySelector('.menu-btn');
const menu = document.querySelector('.top-menu');
const hasChild = document.querySelectorAll('.main-menu li.has-child a.mobile-toggle');

if (menuBtn !== null) {
    menuBtn.addEventListener('click', (e) => {
        e.preventDefault();
        menuBtn.classList.toggle('active');
        menu.classList.toggle('active');
        body.classList.toggle('menu-visible');
    });
}

if (hasChild !== null && window.matchMedia('(max-width: 1024px)').matches) {
    for (let i = 0; i < hasChild.length; i++) {
        hasChild[i].addEventListener('click', (e) => {
            e.preventDefault();
            let parentLi = e.target.closest('li'); // Use closest to ensure parentLi is the <li> element

            // Close all other submenus
            for (let j = 0; j < hasChild.length; j++) {
                if (hasChild[j] !== hasChild[i]) { // Check to avoid toggling the same submenu twice
                    hasChild[j].parentNode.classList.remove('active');
                }
            }

            // Toggle the clicked submenu
            parentLi.classList.toggle('active');
        });
    }
}

function closeMenu() {
    menuBtn.classList.remove('active');
    menu.classList.remove('active');
    body.classList.remove('menu-visible');
    // Close all submenus when the main menu is closed
    for (let i = 0; i < hasChild.length; i++) {
        hasChild[i].classList.remove('active');
    }
}
