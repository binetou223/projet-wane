<?php
function validerChoixMenu(string $choix): bool {
    $choixAutorises = ['0', '1', '2', '3', '4'];
    
    return in_array($choix, $choixAutorises, true); 
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


function validerTelephone(array $wallet): bool {
    $deuxPremier = substr($wallet['telephone'], 0, 2);
    $deuxPremierAutorises = ['77', '78', '76', '70', '75'];
    
    return in_array($deuxPremier, $deuxPremierAutorises, true);
}

function uniciteNumero(array $wallet, array $wallets): int {
    $telephones = array_column($wallets, 'telephone'); 
    $occurence = array_count_values($telephones);
    return $occurence[$wallet['telephone']] ?? 0;
}

function uniciteCode(array $wallet, array $wallets): int {
    $codes = array_column($wallets, 'code');
    $occurence = array_count_values($codes);
    return $occurence[$wallet['code']] ?? 0;
}

