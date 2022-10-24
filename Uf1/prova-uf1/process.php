<?php

$file = "http://localhost/prova-uf1/users.json";
$dades = $_POST['persona'];

/**
 * Guarda les dades a un fitxer
 *
 * @param array $dades
 * @param string $file
 */
function escriu(array $dades, string $file): void
{
    if(isset($dades, $file)){
    file_put_contents($file,json_encode($dades, JSON_PRETTY_PRINT));
    }else{
        echo "ja hi es";
    }
}

print_r($dades);

?>