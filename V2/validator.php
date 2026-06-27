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

