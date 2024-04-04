// Marquee effect
const marqueeGroup = document.querySelector('.marquee .marquee__group');
if (marqueeGroup != null) {
    const parentElement = marqueeGroup.parentElement;
    parentElement.insertBefore(marqueeGroup.cloneNode(true), marqueeGroup.nextSibling);
}

// Dynamic date for copyright
document.getElementById("year").innerHTML = new Date().getFullYear();