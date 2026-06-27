<?php
$wallets = [
    0 => ['client' => 'Baila Wane', 'telephone' => '771001010', 'code' => 1234, 'solde' => 0],
    1 => ['client' => 'Hawa Baila Wane', 'telephone' => '782345678', 'code' => 1200, 'solde' => 100000]
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
