<?php
require_once 'validator.php';
require_once 'repository.php';
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
