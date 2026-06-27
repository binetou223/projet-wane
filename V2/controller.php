<?php
require_once 'services.php';

function switchCase(string $choix):void{
    switch ($choix) {
        case '1':
            echo "\ Créer Wallet...\n";
            
            break;
        case '2':
            echo " Faire Dépôt...\n";
            break;
        case '3':
            echo " Faire Retrait...\n";
            break;
        case '4':
            echo "Lister les Transactions...\n";
            break;
        case '0':
            echo "\nAu revoir !\n";
            break;
        default:
            echo "\nChoix invalide\n";
            break;
    }
}