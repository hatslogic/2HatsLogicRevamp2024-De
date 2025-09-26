// Cookie utility functions
function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
  return null;
}

function setCookie(name, value, days) {
  const expires = new Date();
  expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
  document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
}

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

// Package modal functionality
let packageModalShown = false;

function openPackageModal() {
  // Check if the package modal has already been shown using sessionStorage with 7-day expiration
  const packageModalData = sessionStorage.getItem("packageModalShown");
  if (packageModalShown || packageModalData) {
    // Check if the stored timestamp is less than 7 days old
    if (packageModalData) {
      const storedTime = parseInt(packageModalData);
      const currentTime = Date.now();
      const sevenDaysInMs = 7 * 24 * 60 * 60 * 1000; // 7 days in milliseconds
      
      if (currentTime - storedTime < sevenDaysInMs) {
        return; // Modal was closed within the last 7 days
      } else {
        // Clear expired session storage
        sessionStorage.removeItem("packageModalShown");
      }
    }
  }

  const modal = document.getElementById('packages');
  if (!modal) return;
  
  modal.classList.add("show");
  overlayModal.classList.add("active");
  body.classList.add("disable-scroll");

  // close modal on escape
  window.addEventListener("keyup", function (e) {
    if (e.key === "Escape") closePackageModal();
  });

  packageModalShown = true;
}

function closePackageModal() {
  const modal = document.getElementById('packages');
  if (!modal) return;
  
  modal.classList.remove("show");
  overlayModal.classList.remove("active");
  body.classList.remove("disable-scroll");

  // Store current timestamp in sessionStorage (will expire after 7 days)
  sessionStorage.setItem("packageModalShown", Date.now().toString());
}

// Open package modal after 8 seconds
setTimeout(openPackageModal, 8000);

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
  // Check if the offer modal has already been shown using sessionStorage
  if (offerModalShown || sessionStorage.getItem("offerModalShown")) return;

  const modal = document.getElementById('offer-modal');
  if (!modal) return;
  modal.classList.add("show");
  overlayModal.classList.add("active");
  body.classList.add("disable-scroll");

  // Store in sessionStorage that the offer modal has been shown
  sessionStorage.setItem("offerModalShown", "true");

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

function redirectToPackages(url) {
  window.location.href = url;
}


function updatePackageOption(packageName) {
  const modal = document.getElementById('subscribe');
  if (!modal) return;
  const packageOption = modal.querySelector('#packageOption');
  if (!packageOption) return;
  packageOption.value = packageName;
}
