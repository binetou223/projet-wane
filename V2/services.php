<?php
require_once 'repository.php';
require_once 'validator.php';

function creerWallet(array $newWallet):string{
         global $wallets;
      if (
        validerNombre("telephone", (int)$newWallet['telephone']) &&
        validerTelephone($newWallet) &&
        uniciteNumero($newWallet, $wallets) === 0 &&
        validerNombre("code", (int)$newWallet['code']) &&
        uniciteCode($newWallet, $wallets) === 0 &&
        ((int)$newWallet['solde'] >= 0)
    ) {
        enregistrerDansTableau($newWallet, $wallets);
        
        return "Succès : Portefeuille créé avec succès !";
    }
    return "Erreur : Impossible de créer.";
}

function faireDepot(string $telephone, int $montant): int
{
    global $wallets, $transactions;

    $index = verifierExistenceTelephone($telephone, $wallets);

    if ($index !== false && validerMontant($montant) === true) 
    {
        $nouveauSolde = $wallets[$index]['solde'] + $montant;
        mettreAjourSolde($wallets, $index, $nouveauSolde);

        enregistrerDansTableau(
            ['montant' => $montant, 'indexClient' => $index, 'type' => 'Depot'], 
            $transactions
        );

        return 0;
    }

    return ($index === false) ? 1 : 2; 
}
