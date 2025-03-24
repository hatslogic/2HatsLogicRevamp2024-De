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

const buttons = document.querySelectorAll('.case-study-btn');
const cards = document.querySelectorAll('.case-study-card');

buttons.forEach(button => {
  button.addEventListener('click', () => {
      const previousActive = document.querySelector('.active');
      if (previousActive) {
          previousActive.classList.remove('active');
      }
      button.classList.add('active');
      const category = button.getAttribute('data-category');
      caseStudyFilterFunction(category);
  });
});
function caseStudyFilterFunction(category) {
  cards.forEach(card => {
      const categories = card.getAttribute('data-category')?.split(/\s*,\s*|\s+/) || []; // Split by comma or space

      if (category === "all" || !category || categories.includes(category)) {
          card.classList.remove('hidden'); // Remove hidden to start fade-in
          void card.offsetWidth; // Force reflow to restart animation
          card.classList.add('animate');
      } else {
          card.classList.remove('animate'); // Remove animate first
          card.classList.add('hidden'); // Apply fade-out
      }
  });
}

