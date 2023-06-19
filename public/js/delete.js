const deleteButtons = document.querySelectorAll('.delete-btn');
const deleteModal = document.querySelector("[id='deleteModale']");
const deleteForm = document.querySelector('#deleteForm');
const closeModalButton = document.querySelector('.close');
const modalNom = document.querySelector("[id='nom']");


deleteButtons.forEach(button => {

    button.addEventListener('click', function(e) {

        e.preventDefault();
        console.log('test', e)

        const etudiantNom = this.dataset.etudiantNom;
        const routeEtudiant = this.dataset.etudiantUrl;

        deleteForm.action = routeEtudiant;
        modalNom.innerText = etudiantNom;

        deleteModal.showModal();
    });
});

closeModalButton.addEventListener('click', function() {

    deleteModal.close();
});