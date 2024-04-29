document.addEventListener('DOMContentLoaded', function() {
  var accordionToggles = document.querySelectorAll('.acc-item');

  accordionToggles.forEach(function(toggle) {
    toggle.addEventListener('click', function() {
      var acc = this.querySelector('.acc-content');
      if (acc.style.maxHeight) {
        // Close the acc
        acc.style.maxHeight = null;
        toggle.classList.remove('open');
      } else {
        // Open the acc
        acc.style.maxHeight = acc.scrollHeight + 'px';
        toggle.classList.add('open');
      }
    });
  });
});