const modalConnexion = document.querySelector("[id='modalConnexion']")

document.addEventListener("DOMContentLoaded", function() {
    let pageCourante = window.location.href;

    let pageCible = window.location.origin + '/login'

    if(pageCourante == pageCible){
        modalConnexion.showModal()
    }
})