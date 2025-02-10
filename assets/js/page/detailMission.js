document.addEventListener('DOMContentLoaded', function() {
    const collectionHolder = document.querySelector('#tableorder_mission_detailMission');
    const addItemButton = document.createElement('button');
    addItemButton.type = 'button';
    addItemButton.innerText = 'Ajouter un agent';
    addItemButton.className = 'btn btn-primary';
    collectionHolder.parentElement.appendChild(addItemButton);

    let index = collectionHolder.querySelectorAll('tr').length;

    addItemButton.addEventListener('click', function() {
        const prototype = collectionHolder.getAttribute('data-prototype');
        const newForm = prototype.replace(/__name__/g, index);
        const newRow = document.createElement('tr');
        newRow.innerHTML = newForm;
        collectionHolder.appendChild(newRow);

        // Initialiser la référence
        const referenceInput = newRow.querySelector('.reference-input');
        const referenceSpan = newRow.querySelector('.reference');
        referenceInput.value = index + 1;
        referenceSpan.innerText = index + 1;

        index++;

        // Ajouter un gestionnaire d'événement pour le bouton de suppression
        newRow.querySelector('.del_item_link').addEventListener('click', function() {
            newRow.remove();
            updateReference();
        });
    });

    // Mettre à jour les références après la suppression d'un élément
    function updateReference() {
        const rows = collectionHolder.querySelectorAll('tr');
        rows.forEach((row, i) => {
            const referenceInput = row.querySelector('.reference-input');
            const referenceSpan = row.querySelector('.reference');
            referenceInput.value = i + 1;
            referenceSpan.innerText = i + 1;
        });
    }

    // Ajouter des gestionnaires d'événements pour les boutons de suppression existants
    collectionHolder.querySelectorAll('.del_item_link').forEach(button => {
        button.addEventListener('click', function() {
            button.closest('tr').remove();
            updateReference();
        });
    });
});