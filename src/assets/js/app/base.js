// Marquee effect
const marqueeGroup = document.querySelector('.marquee .marquee__group');
if (marqueeGroup != null) {
    const parentElement = marqueeGroup.parentElement;
    parentElement.insertBefore(marqueeGroup.cloneNode(true), marqueeGroup.nextSibling);
}

// Dynamic date for copyright
document.getElementById("year").innerHTML = new Date().getFullYear();

// Progress bar effect
document.addEventListener("DOMContentLoaded", function() {
    var progressBar = document.getElementById("progress");
    var startTime = new Date().getTime();
    
    var interval = setInterval(function() {
      var currentTime = new Date().getTime();
      var elapsedTime = currentTime - startTime;
      var progress = Math.min((elapsedTime / 800) * 100, 100); // Adjust the 3000 to your desired page load time in milliseconds
      progressBar.style.width = progress + "%";
      
      if (progress >= 100) {
        clearInterval(interval);
      }
    }, 10);
  });

// set timer of 1 sec after page load then add a class on body
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        document.querySelector('.hero mark').classList.add('loaded');
    }, 800);
})