const counters = document.querySelectorAll('.count');

// const counters = document.querySelectorAll('.counter');

const options = {
    root: null,
    threshold: 0.5
};

const animationDuration = 800; // Overall animation duration (all counters)

const counterObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const counter = entry.target;
            const target = counter.querySelector('.digit').dataset.target;
            //   debugger;

            const startTime = performance.now();
            const endTime = startTime + animationDuration;

            animateCountUp(counter, target, startTime, endTime);
            observer.unobserve(counter);
        }
    });
});

function calculateIncrement(target, duration) {
    return Math.floor(target / (duration / 10)); // Adjust increment based on duration
}

function animateCountUp(element, target, startTime, endTime) {
    const currentTime = performance.now();
    const progress = Math.min((currentTime - startTime) / (endTime - startTime), 1); // Progress between 0 and 1
    const currentCount = Math.floor(progress * target);

    element.querySelector('.digit').textContent = currentCount;

    if (progress < 1) {
        requestAnimationFrame(() => animateCountUp(element, target, startTime, endTime));
    } else {
        element.querySelector('.digit').textContent = target; // Ensure final value is reached
    }
}

counters.forEach(counter => counterObserver.observe(counter));