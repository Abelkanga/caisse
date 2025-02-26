<?php

// src/Validator/MontantSortieValide.php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class MontantSortieValide extends Constraint
{
    public $message = 'Le montant saisi ne correspond pas au montant décaissé de la dépense ({{ montant }}).';
}