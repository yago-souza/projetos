<?php

class Filme extends Obra
{

    public function __construct(string $titulo, array $autor, array $genero, int $faixaEtaria, string $lancamento, array $personagens, array $nota, array $premios)
    {
        parent::__construct($titulo, $autor, $genero, $faixaEtaria, $lancamento, $personagens, $nota, $premios);
    }
}