let lastScrollTop = 0;
let ticking = false;
let isScrollingStopped = false;
const stickyMenu = document.querySelector('.sticky-menu');

function hideStickyMenu() {
  stickyMenu.classList.remove('show');
}

function showStickyMenu() {
  stickyMenu.classList.add('show');
}

function updateScrollPosition() {
  const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
  if (currentScroll > lastScrollTop) {
    hideStickyMenu();
  } else {
    showStickyMenu();
    if (isScrollingStopped) {
      isScrollingStopped = false;
    }
  }
  lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
  ticking = false;
}

function handleScroll() {
  if (!ticking) {
    window.requestAnimationFrame(updateScrollPosition);
    ticking = true;
  }

  clearTimeout(isScrollingStopped);
  isScrollingStopped = setTimeout(function() {
    isScrollingStopped = true;
  }, 200); // Adjust this value as needed
}

function handlePageLoad() {
  setTimeout(showStickyMenu(), 700)
}

window.addEventListener('scroll', handleScroll);
window.addEventListener('load', handlePageLoad);
