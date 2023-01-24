<?php

class Obra
{

    private string $titulo;
    private array $autor;
    private array $genero;
    private int $faixaEtaria;
    private string $lancamento;
    private array $personagens;
    private array $nota;
    private array $premios;

    public function __construct(string $titulo,
                                array  $autor,
                                array  $genero,
                                int    $faixaEtaria,
                                string $lancamento,
                                array  $personagens,
                                array  $nota,
                                array  $premios)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->genero = $genero;
        $this->faixaEtaria = $faixaEtaria;
        $this->lancamento = $lancamento;
        $this->personagens = $personagens;
        $this->nota = $nota;
        $this->premios = $premios;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getAutor(): array
    {
        return $this->autor;
    }

    public function setAutor(array $autor): void
    {
        $this->autor = $autor;
    }

    public function getGenero(): array
    {
        return $this->genero;
    }

    public function setGenero(array $genero): void
    {
        $this->genero = $genero;
    }

    public function getFaixaEtaria(): int
    {
        return $this->faixaEtaria;
    }

    public function setFaixaEtaria(int $faixaEtaria): void
    {
        $this->faixaEtaria = $faixaEtaria;
    }

    public function getLancamento(): string
    {
        return $this->lancamento;
    }

    public function setLancamento(string $lancamento): void
    {
        $this->lancamento = $lancamento;
    }

    public function getPersonagens(): array
    {
        return $this->personagens;
    }

    public function setPersonagens(array $personagens): void
    {
        $this->personagens = $personagens;
    }

    public function getNota(): array
    {
        return $this->nota;
    }

    public function setNota(array $nota): void
    {
        $this->nota = $nota;
    }

    public function getPremios(): array
    {
        return $this->premios;
    }

    public function setPremios(array $premios): void
    {
        $this->premios = $premios;
    }
}