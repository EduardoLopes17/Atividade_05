<?php

function mascaraCPF($cpf) {

    $mascara = str_repeat("*", strlen($cpf) - 4);
    $final = substr($cpf, - 4);

    return $mascara . $final;

}

    $cpf = "13889190950";

    echo "$cpf <br>";
    echo mascaraCPF($cpf);

?>