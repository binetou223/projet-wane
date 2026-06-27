<?php
function afficherMenu()
{
    echo "1. Créer Wallet\n";
    echo "2. Faire Dépôt\n";
    echo "3. Faire Retrait\n";
    echo "4. Lister les Transactions\n";
    echo "0. Quitter\n";
};


do {
    echo "          MENU DISTRIBUTEUR         \n";
    
    affichermenu();

    $choix = readline("Votre choix : ");
    
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

} while ($choix !== '0');

