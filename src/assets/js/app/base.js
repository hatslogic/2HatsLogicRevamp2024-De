// Marquee effect
const marqueeElement = document.querySelector('.marquee .marquee__content');
if(marqueeElement != null){
    const parentElement = marqueeElement.parentElement;
    parentElement.insertBefore(marqueeElement.cloneNode(true), marqueeElement.nextSibling);
}

// Dynamic date for copyright
document.getElementById("year").innerHTML = new Date().getFullYear();