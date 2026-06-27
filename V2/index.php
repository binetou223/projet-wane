<?php
require_once 'validator.php';
require_once 'controller.php';
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
    if (!validerChoixMenu($choix)) {
        echo "Choix invalide, veuillez réessayer\n";    
    }else{ 
        switchCase( $choix);
    }
    
} while ($choix!=='0');