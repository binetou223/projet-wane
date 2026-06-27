<?php
$wallets=[
    0=>['client'=>'Baila Wane','telephone'=>'771001010','code'=>1234,'solde'=>0],
    1=>['client'=>'Hawa Baila Wane','telephone'=>'782345678','code'=>00,'solde'=>100000]
];

function enregistrerDansTableau(array $element, array &$tableau): void {
    $tableau[] = $element;
}

function afficherWallet(array $wallets):void{
        // global $wallets;
    echo "\n=== LISTE DES PORTEFEUILLES ===\n";
        for($index=0;$index<count($wallets);$index++){
           echo "Titulaire:". $wallets[$index]['client']."\n";
           echo "Telephone:". $wallets[$index]['telephone']."\n";
           echo "code:".$wallets[$index]['code']."\n";
           echo "solde:".$wallets[$index]['solde']."\n";
           echo "-------------------------------\n";
        }
        
}
