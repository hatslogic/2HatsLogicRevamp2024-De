const form = document.querySelectorAll('.contact-wrap');
const formToggle = document.querySelectorAll('.switch-form-actions > button');

formToggle.forEach((toggle) => {
    toggle.addEventListener('click', (e) => {
        e.preventDefault();
        form.forEach((form) => {
            if(form.id === toggle.dataset.target){
                form.classList.add('show');
            } else {
                form.classList.remove('show');
            }
        });
    });
});


var input = document.querySelector("#phone");

// Function to make an HTTP request
function makeRequest(method, url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, url);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            callback(xhr.responseText);
        } else {
            console.error('Request failed with status ' + xhr.status);
        }
    };
    xhr.onerror = function() {
        console.error('Request failed');
    };
    xhr.send();
}

// Get user's IP address
if(input) {
    makeRequest('GET', 'http://ip-api.com/json/', function(response) {
        var data = JSON.parse(response);
        var countryCode = data.countryCode; // Extract the country code from the response

        var iti = window.intlTelInput(input, {
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            separateDialCode: true,
            autoHideDialCode: false,
            preferredCountries: ['us', 'gb', 'in'],
            initialCountry: countryCode.toLowerCase(), // Use the country code obtained from IP
        });
    });   
}