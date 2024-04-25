// set timer of 1 sec after page load then add a class on body
setTimeout(function () {
    document.querySelector('.hero mark').classList.add('loaded');
}, 800);