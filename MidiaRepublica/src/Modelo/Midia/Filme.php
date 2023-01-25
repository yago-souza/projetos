<?php

class Filme extends Obra
{

    private string $titulo;
    private array $autor;
    private array $genero;
    private int $faixaEtaria;
    private string $lancamento;
    private array $personagens;
    private array $nota;
    private array $premios;

    public function __construct(string $titulo, array $autor, array $genero, int $faixaEtaria, string $lancamento, array $personagens, array $nota, array $premios)
    {
        parent::__construct($titulo, $autor, $genero, $faixaEtaria, $lancamento, $personagens, $nota, $premios);
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->genero = $genero;
        $this->faixaEtaria = $faixaEtaria;
        $this->lancamento = $lancamento;
        $this->personagens = $personagens;
        $this->nota = $nota;
        $this->premios = $premios;
    }
}