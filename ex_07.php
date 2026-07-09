<?php

    function calcularDesconto($Valor){

        if ($Valor > 1000){
            $Desconto = 30;
        }elseif ($Valor > 500){
            $Desconto = 20;
        }elseif ($Valor > 100){
            $Desconto = 10;
        } else {
            $Desconto = 0;
        }

        $ValorDesconto =  $Valor * ($Desconto/ 100);
        $valorFinal  = $Valor - $ValorDesconto;

        return [
            "ValorOriginal" => $Valor,
            "Desconto" => $Desconto,
            "ValorFinal" => $valorFinal
        ];
    }
        $ValorCompra = 777;

        $Resultado = calcularDesconto($ValorCompra);

        echo "Valor da compra: R$ " . number_format($Resultado["ValorOriginal"], 2, ",", ".") . "<br>";
        echo "Desconto aplicado: " . $Resultado["Desconto"] . "%<br>";
        echo "Valor final: R$ " . number_format($Resultado["ValorFinal"], 2, ",", ".");
?>