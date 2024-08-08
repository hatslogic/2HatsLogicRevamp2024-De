const plugins = document.querySelector("#plugins");

if(plugins !== null){
    var pluginsSlider = new HatsSlider("#plugins", {
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
        },
        [
            (pluginsSlider) => {
              let timeout
              let mouseOver = false
              function clearNextTimeout() {
                clearTimeout(timeout)
              }
              function nextTimeout() {
                clearTimeout(timeout)
                if (mouseOver) return
                timeout = setTimeout(() => {
                    pluginsSlider.next()
                }, 2000)
              }
              pluginsSlider.on("created", () => {
                pluginsSlider.container.addEventListener("mouseover", () => {
                  mouseOver = true
                  clearNextTimeout()
                })
                pluginsSlider.container.addEventListener("mouseout", () => {
                  mouseOver = false
                  nextTimeout()
                })
                nextTimeout()
              })
              pluginsSlider.on("dragStarted", clearNextTimeout)
              pluginsSlider.on("animationEnded", nextTimeout)
              pluginsSlider.on("updated", nextTimeout)
            },
          ]
    )
}