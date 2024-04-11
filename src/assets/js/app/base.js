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
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        document.querySelector('.hero mark').classList.add('loaded');
    }, 800);
})