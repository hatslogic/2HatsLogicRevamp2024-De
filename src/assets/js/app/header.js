// Get the sticky element
window.addEventListener('scroll', function() {
  const header = document.querySelector('header');
  const scrollPosition = window.scrollY;

  if (scrollPosition > 0) {
      header.classList.add('scrolled');
  } else {
      header.classList.remove('scrolled');
  }
});

let lastScrollPosition = 0;

window.addEventListener('scroll', function() {
  const header = document.querySelector('header');
  const currentScrollPosition = window.scrollY;

  if (currentScrollPosition > 100) {
    if (currentScrollPosition > lastScrollPosition) {
      // Scrolling down
      header.classList.add('move-to-out');
      header.classList.remove('move-to-in');
    } else if (currentScrollPosition < lastScrollPosition) {
      // Scrolling up
      header.classList.add('move-to-in');
      header.classList.remove('move-to-out');
    }
  } else {
    // If we are within the first 150px of scrolling, ensure the header is in its original state
    header.classList.remove('move-to-out');
    header.classList.remove('move-to-in');
  }

  lastScrollPosition = currentScrollPosition;
});
