<?php

require_once 'src/Modelo/Midia/Pessoa.php';

$yago = new Pessoa('Yago Souza', '26/09/2000', 'São Paulo', 'Ator');

$testeArrayPessoa = [
    "Yago" => $yago,
    "Vitoria" => new Pessoa('Vitoria', '07/07/2003', 'São Paulo', 'Ator'),
];
var_dump($yago);
var_dump($testeArrayPessoa);

