<?php
require_once 'repository.php';
require_once 'services.php';
function saisirWallet(): array
{
    $wallet = ['client' => '', 'telephone' => '', 'code' => 0, 'solde' => 0];
    $wallet['client'] = readline("Veuillez saisir un client :");
    $wallet['telephone'] = readline("Veuillez saisir un telephone :");
    $wallet['code'] = (int)readline("Veuillez saisir un code :");
    $wallet['solde'] = (int)readline("veuillez saisir un solde");
    return $wallet;
}

function switchCase(string $choix): void
{
    global $wallets;
    switch ($choix) {
        case '1':
            echo "\ Créer Wallet...\n";
           $newWallet = saisirWallet();
            creerWallet($newWallet);
            afficherWallet($wallets);

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