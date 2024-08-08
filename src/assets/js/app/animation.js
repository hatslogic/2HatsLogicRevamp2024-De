const anim = document.querySelectorAll(".parralax");
if(anim !== null) {
    var parralax = new Rellax('.parralax', {
        center: true,
        wrapper: null,
        round: true,
        vertical: true,
        horizontal: false,
        breakpoints: [576, 768, 1201]
    });
}