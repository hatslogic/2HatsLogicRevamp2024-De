// let modalClosed = getCookie("modalClosed") === "true";
let modalClosed = false;
let idleTimer;
const idleTime = 9000; // 9 seconds in milliseconds

function openModal(name) {
  if (name != "newsletter-subscription") {
    event.preventDefault();
  }

  var modal = document.getElementById(name);
  var input = modal.querySelector(".form input"); // Assumes there's an input in the modal

  overlayModal.classList.add("active");
  body.classList.add("disable-scroll");
  modal.classList.add("show");

  if (input) {
    // Temporarily disable transitions to ensure input focus works
    modal.style.transition = "none";
    input.style.transition = "none";

    // Force a reflow (flush CSS changes)
    modal.offsetHeight;

    input.focus();

    // Re-enable transitions after a short delay
    setTimeout(() => {
      modal.style.transition = "";
      input.style.transition = "";
    }, 50);

    // Scroll input into view for mobile devices
    if (window.innerWidth <= 768) {
      input.scrollIntoView({
        behavior: "smooth",
      });
    }
  }

  // close modal on escape
  window.addEventListener("keyup", function (e) {
    if (e.key === "Escape") closeModal(name);
  });
}

// Cookie handling functions
// function setCookie(name, value, days) {
//   const d = new Date();
//   d.setTime(d.getTime() + days * 24 * 60 * 60 * 1000); // Set expiration time
//   let expires = "expires=" + d.toUTCString();
//   document.cookie = name + "=" + value + ";" + expires + ";path=/";
// }

// function getCookie(name) {
//   let nameEQ = name + "=";
//   let decodedCookie = decodeURIComponent(document.cookie);
//   let ca = decodedCookie.split(";");
//   for (let i = 0; i < ca.length; i++) {
//     let c = ca[i];
//     while (c.charAt(0) === " ") {
//       c = c.substring(1);
//     }
//     if (c.indexOf(nameEQ) === 0) {
//       return c.substring(nameEQ.length, c.length);
//     }
//   }
//   return "";
// }

// Set up event listeners for user activity

if (!modalClosed) {
  document.addEventListener("mousemove", resetIdleTimer);
  document.addEventListener("keypress", resetIdleTimer);
  document.addEventListener("touchstart", resetIdleTimer);
  document.addEventListener("scroll", resetIdleTimer);  

  // Initial setup of the idle timer
  resetIdleTimer();
}

function closeModal(name) {
  var modal = document.getElementById(name);
  overlayModal.classList.remove("active");
  body.classList.remove("disable-scroll");
  modal.classList.remove("show");

  if (name == "newsletter-subscription") {
    // setCookie("modalClosed", "true", 7);
    modalClosed = true;
  }
}


// function resetIdleTimer() {
//     clearTimeout(idleTimer);
//     if (!modalClosed) {
//       idleTimer = setTimeout(openNewsletterModal, idleTime);
//     }
// }

function resetIdleTimer() {
  clearTimeout(idleTimer); // This removes any previous timer
  if (!modalClosed) {
    idleTimer = setTimeout(openNewsletterModal, idleTime); // Start a new timer
  }
}


function openNewsletterModal() {
    // Replace this with the actual function call to open your modal
    openModal("newsletter-subscription");
}