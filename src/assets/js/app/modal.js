function openModal(name) {
  var modal = document.getElementById(name);
  var input = modal.querySelector('input'); // Assumes there's an input in the modal

  overlayModal.classList.add('active');
  body.classList.add('disable-scroll');
  modal.classList.add('show');

  if (input) {
    setTimeout(() => {
      // Temporarily disable transitions to ensure input focus works
      modal.style.transition = 'none';
      input.style.transition = 'none';

      // Force a reflow (flush CSS changes)
      modal.offsetHeight;

      setTimeout(() => {
        input.focus();
      }, 10);

      // Re-enable transitions after a short delay
      setTimeout(() => {
        modal.style.transition = '';
        input.style.transition = '';
      }, 50);

      // Scroll input into view for mobile devices
      if (window.innerWidth <= 768) {
        input.scrollIntoView({
          behavior: 'smooth'
        });
      }
    }, 500); // Delay to ensure modal is fully open
  }

  // close modal on escape
  window.addEventListener('keyup', function (e) {
    if (e.key === 'Escape') closeModal(name);
  });
}

function closeModal(name) {
  var modal = document.getElementById(name);
  overlayModal.classList.remove('active');
  body.classList.remove('disable-scroll');
  modal.classList.remove('show');
}
