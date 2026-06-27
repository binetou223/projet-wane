<?php
require_once 'repository.php';
require_once 'services.php';

function switchCase(string $choix): void
{
    switch ($choix) {
        case '1':
            echo "\ Créer Wallet...\n";
            
        case '2':
            echo "\n--- OPÉRATION DE DÉPÔT ---\n";

            break;

        case '3':
           echo "\n--- OPÉRATION DE RETRAIT---\n";

            break;

        case '4':
            echo "\n--- CONSULTATION DE L'HISTORIQUE ---\n";

            break;

        case '0':
            echo "\nAu revoir !\n";
            break;
        default:
            echo "\nChoix invalide\n";
            break;
    }
}