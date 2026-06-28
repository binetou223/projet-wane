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

function verifierExistenceTelephone(string $telephoneLeNumero, array $wallets) {
    $telephones = array_column($wallets, 'telephone');
    return array_search($telephoneLeNumero, $telephones, true);
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

function filtrerTransactions(int $indexRecherche, array $transactions): array {
    $filtre = array_filter($transactions, fn($tx) => $tx['indexClient'] === $indexRecherche);
    return array_values($filtre); 
}


