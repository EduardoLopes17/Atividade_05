<?php

function contarCaracteres($texto) {
    return strlen($texto);
}

function limparEspacosDuplicados($texto) {
    return trim(preg_replace('/\s+/', ' ', $texto));
}

function extrairPalavras($texto) {
    $textoLimpo = strtolower($texto);
    $textoLimpo = preg_replace('/[^\w\sà-ú]/u', '', $textoLimpo);
    $textoLimpo = limparEspacosDuplicados($textoLimpo);
    return explode(' ', $textoLimpo);
}

function contarFrases($texto) {
    $frases = preg_split('/[.!?]+/', $texto, -1, PREG_SPLIT_NO_EMPTY);
    return count($frases);
}

function encontrarExtremosPalavras($palavras) {
    $maior = $palavras[0] ?? '';
    $menor = $palavras[0] ?? '';

    foreach ($palavras as $palavra) {
        if (mb_strlen($palavra) > mb_strlen($maior)) {
            $maior = $palavra;
        }
        if (mb_strlen($palavra) < mb_strlen($menor)) {
            $menor = $palavra;
        }
    }

    return [$maior, $menor];
}

function analisarFrequenciaPalavras($palavras) {
    $contagem = array_count_values($palavras);
    
    $repetidas = 0;
    foreach ($contagem as $qtd) {
        if ($qtd > 1) {
            $repetidas++;
        }
    }

    arsort($contagem);
    $maisFrequentes = array_slice(array_keys($contagem), 0, 5);

    return [$repetidas, $maisFrequentes];
}

function formatarPrimeiraMaiuscula($texto) {
    $textoLimpo = limparEspacosDuplicados($texto);
    return ucwords(mb_strtolower($textoLimpo));
}

function processarTexto($texto) {
    $qtdCaracteres = contarCaracteres($texto);
    $textoSemEspacos = limparEspacosDuplicados($texto);
    $palavras = extrairPalavras($texto);
    $qtdPalavras = count($palavras);
    $qtdFrases = contarFrases($texto);
    
    list($palavraMaisLonga, $palavraMaisCurta) = encontrarExtremosPalavras($palavras);
    list($qtdRepetidas, $cincoMaisFrequentes) = analisarFrequenciaPalavras($palavras);
    
    $textoFormatado = formatarPrimeiraMaiuscula($texto);

    return [
        "quantidade_caracteres" => $qtdCaracteres,
        "quantidade_palavras" => $qtdPalavras,
        "quantidade_frases" => $qtdFrases,
        "palavra_mais_longa" => $palavraMaisLonga,
        "palavra_mais_curta" => $palavraMaisCurta,
        "quantidade_palavras_repetidas" => $qtdRepetidas,
        "cinco_palavras_mais_frequentes" => $cincoMaisFrequentes,
        "texto_sem_espacos_duplicados" => $textoSemEspacos,
        "texto_formatado" => $textoFormatado
    ];
}