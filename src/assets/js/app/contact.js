const form = document.querySelectorAll('.contact-wrap');
const formToggle = document.querySelectorAll('.switch-form-actions > button');

formToggle.forEach((toggle) => {
  toggle.addEventListener('click', (e) => {
    e.preventDefault();
    form.forEach((form) => {
      if (form.id === toggle.dataset.target) {
        form.classList.add('show');
      } else {
        form.classList.remove('show');
      }
    });
  });
});