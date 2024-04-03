const marqueeElement = document.querySelector('.marquee .marquee__content');
if(marqueeElement != null){
    const parentElement = marqueeElement.parentElement;
    parentElement.insertBefore(marqueeElement.cloneNode(true), marqueeElement.nextSibling);
}