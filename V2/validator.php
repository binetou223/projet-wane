<?php
function validerChoixMenu(string $choix): bool {
    $choixAutorises = ['0', '1', '2', '3', '4'];

    foreach ($choixAutorises as $option) {
        if ($choix === $option) {
            return true; 
        }
    }
    return false; 
}
function  longueur(string $taille):int{
    if ($taille ==="telephone") {
        return 9;
    }
    if ($taille ==="code") {
        return 4;
    }
        return 0;

}

function validerNombre(string $taille , int $valeur): bool {
    return strlen($valeur) === longueur($taille);
}

function validerTelephone(array $wallet):bool{
$deuxpremier=substr($wallet['telephone'],0,2);
$deuxpremierAutoriser =['77', '78', '76', '70', '75'];
foreach ($deuxpremierAutoriser as $indicatif) {
        if ($deuxpremier === $indicatif) {
            return true;
        }
    }
 
    return false;

}

function uniciteNumero(array $wallet, array $wallets): int {
    $compteurDoublons = 0;

    foreach ($wallets as $walletExistant) {
        if ($walletExistant['telephone'] === $wallet['telephone']) {
            $compteurDoublons++; 
        }
    }

    return $compteurDoublons; 
}
function uniciteCode(array $wallet, array $wallets): int {
    $compteurDoublons = 0;

    foreach ($wallets as $walletExistant) {
        if ($walletExistant['code'] === $wallet['code']) {
            $compteurDoublons++; 
        }
    }

    return $compteurDoublons; 
}

function verifierExistenceTelephone(string $telephoneLeNumero, array $wallets) {
    foreach ($wallets as $index => $wallet) {
        if ($wallet['telephone'] === $telephoneLeNumero) {
            return $index; 
        }
    }
    
    return false; 
}


function validerMontant(int $montant, int $minimum = 0): bool {
    return $montant > $minimum;
}

function calculFrais(int $montant):int{
if ($montant <= 10000) {
        return 200;
    }

if ($montant <= 100000) {
        return 500;
    }
 $fraisCalculés = (int)($montant * 0.01);

 if ($fraisCalculés > 5000) {
        return 5000;
    }
    
    return $fraisCalculés;
}

function verifierSoldeDisponible(int $soldeActuel, int $montantLeRetrait, int $frais): bool {
    return $soldeActuel >= ($montantLeRetrait + $frais);
}