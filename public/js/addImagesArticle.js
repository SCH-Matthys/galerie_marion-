
document.addEventListener('DOMContentLoaded', function () {
    let imageCollection = document.getElementById('image-collection');
    let addImageButton = document.getElementById('add-image');
    let prototype = imageCollection.dataset.prototype;

    addImageButton.addEventListener('click', function () {
        let index = document.querySelectorAll('.image-entry').length;
        let newForm = prototype.replace(/__name__/g, index);

        let div = document.createElement('div');
        div.classList.add('image-entry');
        div.innerHTML = newForm + '<button type="button" class="remove-image">Supprimer</button>';

        imageCollection.appendChild(div);

        // Debugging : Vérifier si un input file est bien ajouté
        let inputFile = div.querySelector('input[type="file"]');
        console.log("Nouvel input file ajouté :", inputFile);

        // Ajouter l’événement de suppression
        div.querySelector('.remove-image').addEventListener('click', function () {
            div.remove();
        });
    });

    // Gérer la suppression des images déjà présentes
    document.querySelectorAll('.remove-image').forEach(button => {
        button.addEventListener('click', function () {
            button.parentElement.remove();
        });
    });
});
