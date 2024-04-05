function navigation(slider) {
    let wrapper = slider.container.parentNode;

    const arrowLeft = wrapper.querySelector('.btn-wrap .testimonial-button-prev');
    const arrowRight = wrapper.querySelector('.btn-wrap .testimonial-button-next');

    arrowLeft.addEventListener("click", () => slider.prev());
    arrowRight.addEventListener("click", () => slider.next());

    function updateClasses() {
        var slide = slider.track.details.rel
        slide === 0 ?
            arrowLeft.classList.add("disabled") :
            arrowLeft.classList.remove("disabled")
        slide === slider.track.details.slides.length - 1 ?
            arrowRight.classList.add("disabled") :
            arrowRight.classList.remove("disabled")
    }

    slider.on("created", () => {
        updateClasses()
    })
    slider.on("optionsChanged", () => {
        updateClasses()
    })
    slider.on("slideChanged", () => {
        updateClasses()
    })
    slider.on("destroyed", () => {
        // markup(true)
    })
}

var slider = new HatsSlider("#testimonials", {
        loop: true,
        mode: "snap",
        rtl: false,
        breakpoints: {
            "(max-width: 580px)": {
                slides: {
                    perView: 1,
                    spacing: 0
                },
            }
        },
        slides: {
            perView: "auto"
        },
    },
    [navigation]
)