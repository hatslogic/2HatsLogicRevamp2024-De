// set timer of 1 sec after page load then add a class on body
const hero = document.querySelector('.hero mark');
setTimeout(function () {
    if(hero != null){
        hero.classList.add('loaded');
    }
}, 800);