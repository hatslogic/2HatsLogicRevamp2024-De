const caseStudySlider = document.querySelector("#case-study-slider");

function dots(slider) {
    let wrapper, dots
  
    function markup(remove) {
      wrapperMarkup(remove)
      dotMarkup(remove)
    }
  
    function removeElement(elment) {
      elment.parentNode.removeChild(elment)
    }
    function createDiv(className) {
      var div = document.createElement("div")
      var classNames = className.split(" ")
      classNames.forEach((name) => div.classList.add(name))
      return div
    }
  
    function wrapperMarkup(remove) {
      if (remove) {
        var parent = wrapper.parentNode
        while (wrapper.firstChild)
          parent.insertBefore(wrapper.firstChild, wrapper)
        removeElement(wrapper)
        return
      }
      wrapper = createDiv("navigation-wrapper")
      slider.container.parentNode.appendChild(wrapper)
      wrapper.appendChild(slider.container)
    }
  
    function dotMarkup(remove) {
      if (remove) {
        removeElement(dots)
        return
      }
      dots = createDiv("dots")
      slider.track.details.slides.forEach((_e, idx) => {
        var dot = createDiv("dot")
        dot.addEventListener("click", () => slider.moveToIdx(idx))
        dots.appendChild(dot)
      })
      wrapper.appendChild(dots)
    }
  
    function updateClasses() {
      var slide = slider.track.details.rel;
      Array.from(dots.children).forEach(function (dot, idx) {
        idx === slide
          ? dot.classList.add("active")
          : dot.classList.remove("active")
      })
    }
  
    slider.on("created", () => {
      markup()
      updateClasses()
    })
    slider.on("optionsChanged", () => {
      console.log(2)
      markup(true)
      markup()
      updateClasses()
    })
    slider.on("slideChanged", () => {
      updateClasses()
    })
    slider.on("destroyed", () => {
      markup(true)
    })
}

if(caseStudySlider !== null){
    var caseStudy = new HatsSlider("#case-study-slider", {
            loop: true,
            auto: false,
            mode: "snap",
            rtl: false,
            slides: {
                perView: 1
            }
        },
        [dots]
    )
}