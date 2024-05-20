const form = document.querySelectorAll('.contact-wrap');
const formToggle = document.querySelectorAll('.switch-form-actions > button');
// function showForm(name){

//     form.forEach((form) => {
//         if(form.id === name){
//             form.classList.add('show');
//         } else {
//             form.classList.remove('show');
//         }
//     });
// }

formToggle.forEach((toggle) => {
    toggle.addEventListener('click', (e) => {
        e.preventDefault();
        form.forEach((form) => {
            if(form.id === toggle.dataset.target){
                form.classList.add('show');
            } else {
                form.classList.remove('show');
            }
        });
    });
})