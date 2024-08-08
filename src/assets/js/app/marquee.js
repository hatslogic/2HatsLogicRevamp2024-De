// Marquee effect
const marqueeGroup = document.querySelector('.marquee .marquee__group');
if (marqueeGroup != null) {
    const parentElement = marqueeGroup.parentElement;
    parentElement.insertBefore(marqueeGroup.cloneNode(true), marqueeGroup.nextSibling);
}