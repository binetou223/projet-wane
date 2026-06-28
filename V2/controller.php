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
    global $transactions;
    switch ($choix) {
        case '1':
            echo "\ Créer Wallet...\n";
            $newWallet = saisirWallet();
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
            echo "\n--- OPÉRATION DE RETRAIT---\n";
            $telephone = readline("Veuillez saisir un telephone : ");
            $montant = (int)readline("Veuillez saisir un montant : ");
            faireRetrait($telephone, $montant);
            break;

        case '4':
            echo "\n--- CONSULTATION DE L'HISTORIQUE ---\n";
            $telephoneSaisi = readline("Veuillez saisir votre numéro de téléphone : ");
            
            $index = verifierExistenceTelephone($telephoneSaisi, $wallets);
            
            if ($index === false) {
                echo "Erreur : Aucun wallet trouvé pour ce numéro de téléphone.\n";
            } else {
                $mesTransactions = filtrerTransactions($index, $transactions);
                $nomDuTitulaire = $wallets[$index]['client'];
                
                afficherHistorique($mesTransactions, $nomDuTitulaire);
            }
            break;

        case '0':
            echo "\nAu revoir !\n";
            break;
        default:
            echo "\nChoix invalide\n";
            break;
    }
}
