import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


const deleteButton = document.querySelectorAll('.confirm-delete-project[type="submit"]');

deleteButton.forEach((button) =>{
    button.addEventListener('click', function(event){
        event.preventDefault();

        const projectTitle = button.getAttribute('data-title');

        const modal = document.getElementById('delete-project');

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const modalTitle = modal.querySelector('#modal-title');
        modalTitle.textContent = projectTitle;

        const deleteButton = modal.querySelector('#confirm-delete');
        deleteButton.addEventListener('click', () =>{
                button.parentElement.submit();
        });

    });
});