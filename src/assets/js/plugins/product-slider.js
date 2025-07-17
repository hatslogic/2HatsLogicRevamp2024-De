
/// Get all image elements inside the thumbnails
const thumbnailsContainer = document.querySelector('.thumbnails');
const thumbnails = document.querySelectorAll('.thumbnails a');
const mainImage = document.getElementById('main-image');
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');

let currentIndex = 0;

// Function to update the main image and active class
function changeImage(index) {
    currentIndex = index;
    mainImage.src = thumbnails[currentIndex].getAttribute('href');

    // Remove active class from all thumbnails
    thumbnails.forEach(thumb => thumb.classList.remove('active'));

    // Add active class to the current thumbnail
    thumbnails[currentIndex].classList.add('active');

    // Scroll the thumbnails into view
    thumbnails[currentIndex].scrollIntoView({
        behavior: 'smooth',
        inline: 'center'
    });

    // Prevent focus causing scroll jump
    document.activeElement.blur();
}

// Click event for thumbnails
thumbnails.forEach((thumb, index) => {
    thumb.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent default link behavior
        event.stopPropagation(); // Prevent bubbling issues
        changeImage(index);
    });
});

// Previous button functionality
prevBtn.addEventListener('click', (event) => {
    event.preventDefault();
    event.stopPropagation();
    currentIndex = (currentIndex - 1 + thumbnails.length) % thumbnails.length;
    changeImage(currentIndex);
    prevBtn.blur();
});

// Next button functionality
nextBtn.addEventListener('click', (event) => {
    event.preventDefault();
    event.stopPropagation();
    currentIndex = (currentIndex + 1) % thumbnails.length;
    changeImage(currentIndex);
    nextBtn.blur();
});

// Set the first image as active on load
changeImage(0);

// ===============================
// Mouse Drag Scrolling for Thumbnails
// ===============================
let isDragging = false;
let startX, scrollLeft;

thumbnailsContainer.addEventListener('mousedown', (e) => {
    isDragging = true;
    thumbnailsContainer.classList.add('dragging');
    startX = e.pageX - thumbnailsContainer.offsetLeft;
    scrollLeft = thumbnailsContainer.scrollLeft;
});

thumbnailsContainer.addEventListener('mouseleave', () => {
    isDragging = false;
    thumbnailsContainer.classList.remove('dragging');
});

thumbnailsContainer.addEventListener('mouseup', () => {
    isDragging = false;
    thumbnailsContainer.classList.remove('dragging');
});

thumbnailsContainer.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    e.preventDefault();
    const x = e.pageX - thumbnailsContainer.offsetLeft;
    const walk = (x - startX) * 2; // Adjust scroll speed
    thumbnailsContainer.scrollLeft = scrollLeft - walk;
});

// Prevent text/image selection while dragging
thumbnailsContainer.addEventListener('dragstart', (e) => {
    e.preventDefault();
});

