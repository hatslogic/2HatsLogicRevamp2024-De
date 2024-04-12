// Marquee effect
const marqueeGroup = document.querySelector('.marquee .marquee__group');
if (marqueeGroup != null) {
    const parentElement = marqueeGroup.parentElement;
    parentElement.insertBefore(marqueeGroup.cloneNode(true), marqueeGroup.nextSibling);
}

// Dynamic date for copyright
document.getElementById("year").innerHTML = new Date().getFullYear();

// Progress bar effect
window.addEventListener('scroll', () => {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (scrollTop / scrollHeight) * 100;
    document.getElementById('progress').style.width = `${scrolled}%`;
});

// set timer of 1 sec after page load then add a class on body
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        document.querySelector('.hero mark').classList.add('loaded');
    }, 800);
})

// 
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
    if (isScrollingStopped) {
      showStickyMenu();
      isScrollingStopped = false;
    }
  }
  lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
  ticking = false;
}

window.addEventListener('scroll', function() {
  if (!ticking) {
    window.requestAnimationFrame(updateScrollPosition);
    ticking = true;
  }
  
  clearTimeout(isScrollingStopped);
  isScrollingStopped = setTimeout(function() {
    isScrollingStopped = true;
  }, 200); // Adjust this value as needed
});