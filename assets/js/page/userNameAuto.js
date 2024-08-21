$(document).ready(function () {
    console.log('Script Loaded'); // Assurez-vous que le script est exécuté

    $('#user_fullName').on('input', function () {
        const fullName = $('#user_fullName').val().toLowerCase().trim();

        let prefix = '';
        if (fullName) {
            // Séparer le prénom et le nom en supposant qu'il y a un espace entre eux
            const nameParts = fullName.split(' ');

            if (nameParts.length > 1) {
                const firstName = nameParts[0];
                const lastName = nameParts[nameParts.length - 1];

                // Prendre les deux premières lettres du prénom et les mettre en majuscules
                const firstNamePrefix = firstName.substring(0, 2).toUpperCase();

                // Utiliser le nom de famille entier
                prefix = lastName + firstNamePrefix;
            } else {
                // Si l'utilisateur ne met qu'un seul mot, on utilise seulement ce mot pour l'identifiant
                prefix = nameParts[0];
            }
        }

        // Générer une chaîne aléatoire de 4 chiffres
        let length = 4;
        let charset = "0123456789";
        let randomString = "";
        for (let i = 0; i < length; i++) {
            randomString += charset.charAt(Math.floor(Math.random() * charset.length));
        }

        // Construire le nom d'utilisateur final
        const username = `${prefix}_${randomString}`;

        // Afficher le résultat dans le champ Pseudo (identifiant)
        $('#user_pseudo').val(username);
    });
});
