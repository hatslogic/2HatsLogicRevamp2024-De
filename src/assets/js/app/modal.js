function openModal(name){
    var modal = document.getElementById(name);
    modal.classList.add('show');
}

function closeModal(name){
    var modal = document.getElementById(name);
    modal.classList.remove('show');
}