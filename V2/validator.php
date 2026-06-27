<?php
function validerChoixMenu(string $choix): bool {
    $choixAutorises = ['0', '1', '2', '3', '4'];
    
    return in_array($choix, $choixAutorises, true); 
}
