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


var input = document.querySelector("#phone");


function getUserCountryCode() {
  return new Promise((resolve, reject) => {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const latitude = position.coords.latitude;
          const longitude = position.coords.longitude;

          // Use an external service like IPify or MaxMind to get country code based on geolocation
          fetch(`https://api.ipify.org?lat=${latitude}&lon=${longitude}`)
            .then(response => response.json())
            .then(data => resolve(data.country_code))
            .catch(error => {
              console.error("Error fetching geolocation data from external service:", error);
              resolve(''); // Empty string fallback
              // Alternatively, use a default country code: resolve('us');
            });
        },
        (error) => {
          console.error("Error getting geolocation:", error);
          resolve(''); // Empty string fallback
          // Alternatively, use a default country code: resolve('us');
        }
      );
    } else {
      console.warn("Geolocation is not supported by this browser.");
      resolve(''); // Fallback to empty string if geolocation is unavailable
    }
  });
}

async function initializeIntlTelInput() {
  const countryCode = await getUserCountryCode();
  var iti = window.intlTelInput(input, {
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    separateDialCode: true,
    autoHideDialCode: false,
    preferredCountries: ['us', 'gb', 'in'],
    initialCountry: countryCode || '', // Fallback to empty string if countryCode is not available
  });
}


if (input) {
  initializeIntlTelInput();
}
