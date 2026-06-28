<?php
require_once 'repository.php';
require_once 'validator.php';
use Repository as res;
use Validator as vali;
function creerWallet(array $newWallet):string{
         global $wallets;
      if (
        vali\validerNombre("telephone", (int)$newWallet['telephone']) &&
        vali\validerTelephone($newWallet) &&
        vali\uniciteNumero($newWallet, $wallets) === 0 &&
        vali\validerNombre("code", (int)$newWallet['code']) &&
       vali\uniciteCode($newWallet, $wallets) === 0 &&
        ((int)$newWallet['solde'] >= 0)
    ) {
       res\enregistrerDansTableau($newWallet, $wallets);
        
        return "Succès : Portefeuille créé avec succès !";
    }
    return "Erreur : Impossible de créer.";
}

function faireDepot(string $telephone, int $montant): int
{
    global $wallets, $transactions;

    $index = vali\verifierExistenceTelephone($telephone, $wallets);

    if ($index !== false && vali\validerMontant($montant) === true) 
    {
        $nouveauSolde = $wallets[$index]['solde'] + $montant;
        res\mettreAjourSolde($wallets, $index, $nouveauSolde);

        res\enregistrerDansTableau(
            ['montant' => $montant, 'indexClient' => $index, 'type' => 'Depot'], 
            $transactions
        );

        return 0;
    }

    return ($index === false) ? 1 : 2; 
}

function faireRetrait(string $telephone, int $montant): int
{
    global $wallets, $transactions;

    $index = vali\verifierExistenceTelephone($telephone, $wallets);

    $frais = vali\calculFrais($montant);

    if ($index !== false && vali\validerMontant($montant) === true && vali\verifierSoldeDisponible($wallets[$index]['solde'], $montant, $frais) === true) 
    {
        $nouveauSolde = $wallets[$index]['solde'] - $montant - $frais;
        res\mettreAjourSolde($wallets, $index, $nouveauSolde);

        res\enregistrerDansTableau(
            ['montant' => $montant, 'frais' => $frais, 'indexClient' => $index, 'type' => 'Retrait'], 
            $transactions
        );

        return 0; 
    }

    if ($index === false) {
        return 1; 
    }
    
    return (!vali\validerMontant($montant)) ? 2 : 3; 
}


