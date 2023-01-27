<?php

class Pessoa
{
    private string $nome;
    private string $dataNascimento;
    private string $naturalidade;
    private string $ocupacao;

    public function __construct(string $nome,
                                string $dataNascimento,
                                string $naturalidade,
                                string $ocupacao)
    {
        $this->nome = $nome;
        $this->dataNascimento = $dataNascimento;
        $this->naturalidade = $naturalidade;
        $this->ocupacao = $ocupacao;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getDataNascimento(): string
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(string $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function getNaturalidade(): string
    {
        return $this->naturalidade;
    }

    public function setNaturalidade(string $naturalidade): void
    {
        $this->naturalidade = $naturalidade;
    }

    public function getOcupacao(): string
    {
        return $this->ocupacao;
    }

    public function setOcupacao(string $ocupacao): void
    {
        $this->ocupacao = $ocupacao;
    }
}