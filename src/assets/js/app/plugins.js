const plugins = document.querySelector("#plugins");

if(plugins !== null){
    var testimonialSlider = new HatsSlider("#plugins", {
            loop: true,
            auto: true,
            mode: "snap",
            rtl: false,
            breakpoints: {
                "(max-width: 768px)": {
                    slides: {
                        perView: 1,
                        spacing: 0
                    },
                }
            },
            slides: {
                perView: "auto"
            },
        }
    )
}