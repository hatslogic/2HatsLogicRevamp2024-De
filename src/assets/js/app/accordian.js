const accordionToggles = document.querySelectorAll('.acc-item');

if (accordionToggles !== null) {
  accordionToggles.forEach(function (toggle, index) {
    toggle.addEventListener('click', function () {
      const acc = this.querySelector('.acc-content');
      const isCurrentlyOpen = acc.style.maxHeight !== '';

      // Close all accordion items
      accordionToggles.forEach(function (item) {
        item.querySelector('.acc-content').style.maxHeight = null;
        item.classList.remove('open');
      });

      // Toggle the current item
      if (isCurrentlyOpen) {
        acc.style.maxHeight = null;
      } else {
        acc.style.maxHeight = acc.scrollHeight + 'px';
      }
      toggle.classList.toggle('open', !isCurrentlyOpen);
    });

    // Open the first accordion item by default
    if (index === 0) {
      const acc = toggle.querySelector('.acc-content');
      acc.style.maxHeight = acc.scrollHeight + 'px';
      toggle.classList.add('open');
    }
  });
}
