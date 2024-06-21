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


var phoneInput = document.querySelectorAll("[type=phone]");
if (phoneInput) {
  phoneInput.forEach((phoneInput) => {
    var iti = window.intlTelInput(phoneInput, {
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
      separateDialCode: true,
      autoHideDialCode: false,
      preferredCountries: ['us', 'gb', 'in'],
      initialCountry: 'in',
    });
  });
}