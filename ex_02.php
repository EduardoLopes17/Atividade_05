<?php

function inverterTexto($texto){

    $textoInvertudo = strrev ($texto);
    return  $textoInvertudo;

}

$texto = "Hugo soneca";

echo "Texto:" . $texto . "<br>";
echo "Texto invertido: " . inverterTexto($texto) . "<br>";
echo  "Quantidade de caractere: " . strlen($texto);