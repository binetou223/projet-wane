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

function validerNombre(string $taille , int $valeur): bool {
    return strlen($valeur) === $taille;
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