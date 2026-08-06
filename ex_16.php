<?php
function contarMaiusculas(senha) {
  const match = senha.match(/[A-Z]/g);
  return match ? match.length : 0;
}

function contarMinusculas(senha) {
  const match = senha.match(/[a-z]/g);
  return match ? match.length : 0;
}

function contarNumeros(senha) {
  const match = senha.match(/[0-9]/g);
  return match ? match.length : 0;
}

function contarEspeciais(senha) {
  const match = senha.match(/[^a-zA-Z0-9\s]/g);
  return match ? match.length : 0;
}

function classificarSenha(tamanho, temMaiuscula, temMinuscula, temNumero, temEspecial) {
  if (tamanho < 8) {
    return "Fraca";
  }

  const tiposPresentes = [temMaiuscula, temMinuscula, temNumero, temEspecial]
    .filter(Boolean).length;

  if (tiposPresentes === 4) {
    return "Muito Forte";
  } else if (tiposPresentes === 3) {
    return "Forte";
  } else if (tiposPresentes === 2) {
    return "Média";
  } else {
    return "Fraca";
  }
}

function analisarSenha(senha) {
  const qtdMaiusculas = contarMaiusculas(senha);
  const qtdMinusculas = contarMinusculas(senha);
  const qtdNumeros = contarNumeros(senha);
  const qtdEspeciais = contarEspeciais(senha);
  const tamanho = senha.length;

  const nivelSeguranca = classificarSenha(
    tamanho,
    qtdMaiusculas > 0,
    qtdMinusculas > 0,
    qtdNumeros > 0,
    qtdEspeciais > 0
  );

  return [
    qtdMaiusculas,
    qtdMinusculas,
    qtdNumeros,
    qtdEspeciais,
    tamanho,
    nivelSeguranca
  ];
}