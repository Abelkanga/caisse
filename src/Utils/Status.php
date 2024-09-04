<?php

namespace App\Utils;

class Status
{
    public const EN_ATTENTE = 'en attente'; // ROLE_USER => créer/modifier Fiche de besoin

    const CANCELLED = 'annulée'; // ROLE_RESPONSABLE => valider/annuler Fiche de besoin

    const CONVERT = 'convertit'; // ROLE_MANAGER => Créer/Convertir Réçu de caisse et Bon de caisse

    const APPROUVED = 'approuvéed'; // ROLE_MANAGER1 => Approuver Fiche de besoin

    const VALIDATED = 'validée'; // ROLE_RESPONSABLE => valider/annuler Fiche de besoin
    const BROUILLON = 'brouillon'; //ROLE_USER => créer/modifier Fiche de besoin

}