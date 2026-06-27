<?php
$wallets=[
    0=>['client'=>'Baila Wane','telephone'=>'771001010','code'=>1234,'solde'=>0],
    1=>['client'=>'Hawa Baila Wane','telephone'=>'782345678','code'=>00,'solde'=>100000]
];
$transactions=[
    0=>['montant' => 1000, 'indexClient' => 1, 'type' => 'Depot'], 
    1=>['montant'=>5000,'indexClient'=>0,'type' => 'retrait']

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

function mettreAjourSolde(array &$wallets, int $index, int $nouveauSolde): void {
    $wallets[$index]['solde'] += $nouveauSolde;
}


function afficherHistorique(array $transactionsFiltrées, string $nomClient): void {
    
    if (count($transactionsFiltrées) > 0) {
        echo "\n=============================================\n";
        echo "   HISTORIQUE DES TRANSACTIONS : $nomClient \n";
        echo "=============================================\n";
        
        for ($i = 0; $i < count($transactionsFiltrées); $i++) {
            $t = $transactionsFiltrées[$i];
            
            echo "🔹 Type    : " . $t['type'] . "\n";
            echo "   Montant : " . $t['montant'] . " CFA\n";
            echo "---------------------------------------------\n";
        }
    } 
    else {
        echo "\nℹ️ Info : Aucune transaction enregistrée pour $nomClient.\n";
    }
}
