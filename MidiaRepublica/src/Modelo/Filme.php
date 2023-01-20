<?php

class Filme
{
    private string $titulo;
    private string $diretores;
    private string $atores;
    private string $personagens;
    private string $produtoras;
    private string $lancamento;
    private float $nota;
    private int $duração;
    private string $enredo;

    public function __construct(
        string $titulo,
        string $diretores,
        string $atores,
        string $personagens,
        string $produtoras,
        string $lancamento,
        float  $nota,
        int    $duração,
        string $enredo
    )
    {
        $this->titulo = $titulo;
        $this->diretores = $diretores;
        $this->atores = $atores;
        $this->personagens = $personagens;
        $this->produtoras = $produtoras;
        $this->lancamento = $lancamento;
        $this->nota = $nota;
        $this->duração = $duração;
        $this->enredo = $enredo;
    }


    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }


    public function getDiretores(): string
    {
        return $this->diretores;
    }

    public function setDiretores(string $diretores): void
    {
        $this->diretores = $diretores;
    }


    public function getAtores(): string
    {
        return $this->atores;
    }

    public function setAtores(string $atores): void
    {
        $this->atores = $atores;
    }


    public function getPersonagens(): string
    {
        return $this->personagens;
    }

    public function setPersonagens(string $personagens): void
    {
        $this->personagens = $personagens;
    }


    public function getProdutoras(): string
    {
        return $this->produtoras;
    }

    public function setProdutoras(string $produtoras): void
    {
        $this->produtoras = $produtoras;
    }


    public function getLancamento(): string
    {
        return $this->lancamento;
    }

    public function setLancamento(string $lancamento): void
    {
        $this->lancamento = $lancamento;
    }

    public function getNota(): float
    {
        return $this->nota;
    }

    public function setNota(float $nota): void
    {
        $this->nota = $nota;
    }

    public function getDuração(): int
    {
        return $this->duração;
    }

    public function setDuração(int $duração): void
    {
        $this->duração = $duração;
    }


    public function getEnredo(): string
    {
        return $this->enredo;
    }

    public function setEnredo(string $enredo): void
    {
        $this->enredo = $enredo;
    }


}


