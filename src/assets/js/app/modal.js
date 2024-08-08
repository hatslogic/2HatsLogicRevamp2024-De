
function openModal(name){
    var modal = document.getElementById(name);
    overlayModal.classList.add('active');
    body.classList.add('disable-scroll');
    modal.classList.add('show');
}

function closeModal(name){
    var modal = document.getElementById(name);
    overlayModal.classList.remove('active');
    body.classList.remove('disable-scroll');
    modal.classList.remove('show');
}


