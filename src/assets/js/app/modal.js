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



function resetIdleTimer() {
  clearTimeout(idleTimer); // This removes any previous timer

}


function openNewsletterModal() {
  // Replace this with the actual function call to open your modal
  openModal("newsletter-subscription");
}



let offerModalShown = false;


function openOfferModal() {
  // Check if the offer modal has already been shown by reading the cookie
  if (offerModalShown || document.cookie.includes("offerModalShown=true")) return;

  const modal = document.getElementById('offer-modal');
  if (!modal) return;
  modal.classList.add("show");
  overlayModal.classList.add("active");
  body.classList.add("disable-scroll");

  // Set a cookie to indicate the offer modal has been shown
  document.cookie = "offerModalShown=true; path=/; max-age=604800"; // Cookie expires in 7 days

  // close modal on escape
  window.addEventListener("keyup", function (e) {
    if (e.key === "Escape") closeOfferModal();
  });

  offerModalShown = true;
}

function closeOfferModal() {
  const modal = document.getElementById('offer-modal');
  if (!modal) return;
  modal.classList.remove("show");
  overlayModal.classList.remove("active");
  body.classList.remove("disable-scroll");

}

// Open modal after 6 seconds
setTimeout(openOfferModal, 6000);