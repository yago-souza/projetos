<?php
$nomeArquivo = 'teste.csv';
$arquivo = fopen($nomeArquivo, 'a+');

for($i=0; $i<=10; $i++) {
    $string = "Teste $i" . PHP_EOL;
    fputcsv($arquivo, $string, ';');
}
echo "Quer outra dica?(y/n)\n";
# Recebe uma string digitada pelo usuario
$teclado = fopen('php://stdin', 'r');
# Tira a quebra de texto do input do teclado e armazena na variavel
$tecladoResposta = trim(fgets($teclado));