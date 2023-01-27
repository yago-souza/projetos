<?php

class Filme
{

    protected string $titulo;
    protected array $autor;
    protected array $genero;
    protected int $faixaEtaria;
    protected string $lancamento;
    protected array $personagens;
    protected array $nota;
    protected array $premios;

    public function __construct()
    {
    }



    /**
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * @return array
     */
    public function getAutor(): array
    {
        return $this->autor;
    }

    /**
     * @return array
     */
    public function getGenero(): array
    {
        return $this->genero;
    }

    /**
     * @return int
     */
    public function getFaixaEtaria(): int
    {
        return $this->faixaEtaria;
    }

    /**
     * @return string
     */
    public function getLancamento(): string
    {
        return $this->lancamento;
    }

    /**
     * @return array
     */
    public function getPersonagens(): array
    {
        return $this->personagens;
    }

    /**
     * @return array
     */
    public function getNota(): array
    {
        return $this->nota;
    }

    /**
     * @return array
     */
    public function getPremios(): array
    {
        return $this->premios;
    }

    /**
     * @param string $titulo
     * @return Filme
     */
    public function setTitulo(string $titulo): Filme
    {
        $this->titulo = $titulo;
        return $this;
    }

    /**
     * @param array $autor
     * @return Filme
     */
    public function setAutor(array $autor): Filme
    {
        $this->autor = $autor;
        return $this;
    }

    /**
     * @param array $genero
     * @return Filme
     */
    public function setGenero(array $genero): Filme
    {
        $this->genero = $genero;
        return $this;
    }

    /**
     * @param int $faixaEtaria
     * @return Filme
     */
    public function setFaixaEtaria(int $faixaEtaria): Filme
    {
        $this->faixaEtaria = $faixaEtaria;
        return $this;
    }

    /**
     * @param string $lancamento
     * @return Filme
     */
    public function setLancamento(string $lancamento): Filme
    {
        $this->lancamento = $lancamento;
        return $this;
    }

    /**
     * @param array $personagens
     * @return Filme
     */
    public function setPersonagens(array $personagens): Filme
    {
        $this->personagens = $personagens;
        return $this;
    }

    /**
     * @param array $nota
     * @return Filme
     */
    public function setNota(array $nota): Filme
    {
        $this->nota = $nota;
        return $this;
    }

    /**
     * @param array $premios
     * @return Filme
     */
    public function setPremios(array $premios): Filme
    {
        $this->premios = $premios;
        return $this;
    }
}

/*
 * Filmes
                                Titulo: array
                                lançamento: string
                                ## um array com objetos dentro
                                Ator: arrayPessoa[] Objetoessoa {
                                                    Nome,
                                                    nascimento,
                                                    naturalidade,
                                                    ocupação(ator, diretor, escritor),
                                                    filmes,
                                                }

                                Diretor: arrayPessoa[]
                                Escritor: arrayPessoa[]

                                Produtora: objeto produtora

                                trilha sonora: Pessoa
                                genero array
                                descrição{}
                                Avaliação objeto {
                                    AVALIADOR (IMDB, RT, ETC)
                                    NOTA
                                }
                                personagens objeto {
                                    Personagem
                                    Ator
                                }
                                premiaçoes objeto{

                                    Premio objeto{
                                        (Oscar, canes, etc)
                                    Indicaçoes int
                                    Vitorias string (Melhor filme, melhor ator, etc)
                                    }

                                }
                                faixa etaria int
*/