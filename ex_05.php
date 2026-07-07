<?php

function analisarTexto($texto){

    $palavra = str_word_count ($texto);
    $caractere = strlen ($texto);
    $vogais = preg_match_all("/[aeiouAEIOU]/", $texto);
    $consoantes = preg_match_all ("/[bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ]/", $texto);

    return [
        "Palavra" => $palavra, 
        "Caractere" => $caractere, 
        "Vogais" => $vogais, 
        "Consoantes" => $consoantes 
    ];

}

$texto_usuario = "Hugo soneca";

$resultado = analisarTexto($texto_usuario);

echo "Texto: " . $texto . "<br>";
echo "Quantidade de Palavra:" .  $resultado["Palavra"] . "<br>";
echo "Quantidade de caractere: " .$resultado["Caractere"] . "<br>";
echo "Quantidade de Vogais: " . $resultado["Vogais"] . "<br>";
echo "Quantidade de Consoantes: " . $resultado["Consoantes"] . "<br>";