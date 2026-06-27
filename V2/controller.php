<?php
require_once 'services.php';
require_once 'repository.php';
function saisirWallet():array{
    $wallet=['client'=>'','telephone'=>'','code'=>0,'solde'=>0];
    $wallet['client'] =readline("Veuillez saisir un client :");
    $wallet['telephone'] =readline("Veuillez saisir un telephone :");
    $wallet['code'] = (int)readline("Veuillez saisir un code :");
    $wallet['solde']= (int)readline("veuillez saisir un solde");
    return $wallet ;
}

function switchCase(string $choix):void{
    global $wallets;
    switch ($choix) {
        case '1':
            echo "\ Créer Wallet...\n";
             $newWallet=saisirWallet();
            creerWallet($newWallet);
            afficherWallet($wallets);
            break;
        case '2':
            echo "\n--- OPÉRATION DE DÉPÔT ---\n";
            $telephone = readline("Veuillez saisir un telephone : ");
            
            $montant = (int)readline("Veuillez saisir un montant : ");
            
            faireDepot($telephone, $montant);
            
            break;

         case '3':
            echo "\n--- OPÉRATION DE RETRAIT ---\n";
            
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