const flipItems = document.querySelectorAll('.flip-wrap .flip-item');
const flipItemTrigger = document.querySelectorAll('.flip-wrap .flip-item-trigger');

if (flipItems !== null && flipItemTrigger !== null) {
    flipItemTrigger.forEach((trigger) => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            flipItems.forEach((item) => {
                item.classList.remove('active');
            })
            trigger.parentElement.classList.add('active');
        })
    })
}