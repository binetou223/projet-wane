<?php
namespace Repository;
$wallets = [
    0 => ['client' => 'Baila Wane', 'telephone' => '771001010', 'code' => 1234, 'solde' => 0],
    1 => ['client' => 'Hawa Baila Wane', 'telephone' => '782345678', 'code' => 1200, 'solde' => 100000]
];

$transactions=[
    0=>['montant' => 1000, 'indexClient' => 1, 'type' => 'Depot'], 
    1=>['montant'=>5000,'indexClient'=>0,'type' => 'retrait']

];

function enregistrerDansTableau(array $element, array &$tableau): void {
    array_push($tableau, $element);
}


function afficherWallet(array $wallets): void
{
    // global $wallets;
    echo "\n=== LISTE DES PORTEFEUILLES ===\n";
    array_map(function (array $wallet) {
        echo "Titulaire: " . $wallet['client'] . "\n";
        echo "Telephone: " . $wallet['telephone'] . "\n";
        echo "code: " . $wallet['code'] . "\n";
        echo "solde: " . $wallet['solde'] . "\n";
        echo "-------------------------------\n";
    }, $wallets);
}
function mettreAjourSolde(array &$wallets, int $index, int $montant): void {
    $wallets[$index]['solde'] += $montant;
}

function afficherHistorique(array $transactionsFiltrées, string $nomClient): void {
    if (empty($transactionsFiltrées)) {
        echo " Info : Aucune transaction enregistrée pour $nomClient.\n";
        return;
    }

    echo "\n=============================================\n";
    echo "   HISTORIQUE DES TRANSACTIONS : $nomClient \n";
    echo "=============================================\n";
    
    // array_map applique l'affichage proprement sur chaque transaction
    array_map(function(array $t) {
        echo "🔹 Type    : " . $t['type'] . "\n";
        echo "   Montant : " . $t['montant'] . " CFA\n";
        echo "---------------------------------------------\n";
    }, $transactionsFiltrées);
}
