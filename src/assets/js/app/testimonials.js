const testimonials = document.querySelector("#testimonials");

function navigation(testimonialSlider) {
    let wrapper = testimonialSlider.container.parentNode;

    const arrowLeft = wrapper.querySelector('.btn-wrap .testimonial-button-prev');
    const arrowRight = wrapper.querySelector('.btn-wrap .testimonial-button-next');

    arrowLeft.addEventListener("click", () => testimonialSlider.prev());
    arrowRight.addEventListener("click", () => testimonialSlider.next());

    function updateClasses() {
        var slide = testimonialSlider.track.details.rel
        slide === 0 ?
            arrowLeft.classList.add("disabled") :
            arrowLeft.classList.remove("disabled")
        slide === testimonialSlider.track.details.slides.length - 1 ?
            arrowRight.classList.add("disabled") :
            arrowRight.classList.remove("disabled")
    }

    testimonialSlider.on("created", () => {
        updateClasses()
    })
    testimonialSlider.on("optionsChanged", () => {
        updateClasses()
    })
    testimonialSlider.on("slideChanged", () => {
        updateClasses()
    })
    testimonialSlider.on("destroyed", () => {
        // markup(true)
    })
}

if(testimonials !== null){
    var testimonialSlider = new HatsSlider("#testimonials", {
            loop: true,
            mode: "snap",
            rtl: false,
            breakpoints: {
                "(max-width: 1320px)": {
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
}