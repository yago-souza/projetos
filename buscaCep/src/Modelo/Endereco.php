<?php

class Endereco
{

    protected string $cep;
    protected string $logadouro;
    protected string $complemento;
    protected string $bairro;
    protected string $localidade;
    protected string $ibge;
    protected string $uf;
    protected string $gia;
    protected string $ddd;
    protected string $siafi;

    public function __construct(string $cep,
                                string $logadouro,
                                string $complemento,
                                string $bairro,
                                string $localidade,
                                string $ibge,
                                string $uf,
                                string $gia,
                                string $ddd,
                                string $siafi)
    {
        $this->cep = $cep;
        $this->logadouro = $logadouro;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->localidade = $localidade;
        $this->ibge = $ibge;
        $this->uf = $uf;
        $this->gia = $gia;
        $this->ddd = $ddd;
        $this->siafi = $siafi;
    }

    /**
     * @param string $cep
     * @return Endereco
     */
    public function setCep(string $cep): Endereco
    {
        $this->cep = $cep;
        return $this;
    }

    /**
     * @param string $logadouro
     * @return Endereco
     */
    public function setLogadouro(string $logadouro): Endereco
    {
        $this->logadouro = $logadouro;
        return $this;
    }

    /**
     * @param string $complemento
     * @return Endereco
     */
    public function setComplemento(string $complemento): Endereco
    {
        $this->complemento = $complemento;
        return $this;
    }

    /**
     * @param string $bairro
     * @return Endereco
     */
    public function setBairro(string $bairro): Endereco
    {
        $this->bairro = $bairro;
        return $this;
    }

    /**
     * @param string $localidade
     * @return Endereco
     */
    public function setLocalidade(string $localidade): Endereco
    {
        $this->localidade = $localidade;
        return $this;
    }

    /**
     * @param string $ibge
     * @return Endereco
     */
    public function setIbge(string $ibge): Endereco
    {
        $this->ibge = $ibge;
        return $this;
    }

    /**
     * @param string $uf
     * @return Endereco
     */
    public function setUf(string $uf): Endereco
    {
        $this->uf = $uf;
        return $this;
    }

    /**
     * @param string $gia
     * @return Endereco
     */
    public function setGia(string $gia): Endereco
    {
        $this->gia = $gia;
        return $this;
    }

    /**
     * @param string $ddd
     * @return Endereco
     */
    public function setDdd(string $ddd): Endereco
    {
        $this->ddd = $ddd;
        return $this;
    }

    /**
     * @param string $siafi
     * @return Endereco
     */
    public function setSiafi(string $siafi): Endereco
    {
        $this->siafi = $siafi;
        return $this;
    }

    /**
     * @return string
     */
    public function getCep(): string
    {
        return $this->cep;
    }

    /**
     * @return string
     */
    public function getLogadouro(): string
    {
        return $this->logadouro;
    }

    /**
     * @return string
     */
    public function getComplemento(): string
    {
        return $this->complemento;
    }

    /**
     * @return string
     */
    public function getBairro(): string
    {
        return $this->bairro;
    }

    /**
     * @return string
     */
    public function getLocalidade(): string
    {
        return $this->localidade;
    }

    /**
     * @return string
     */
    public function getIbge(): string
    {
        return $this->ibge;
    }

    /**
     * @return string
     */
    public function getUf(): string
    {
        return $this->uf;
    }

    /**
     * @return string
     */
    public function getGia(): string
    {
        return $this->gia;
    }

    /**
     * @return string
     */
    public function getDdd(): string
    {
        return $this->ddd;
    }

    /**
     * @return string
     */
    public function getSiafi(): string
    {
        return $this->siafi;
    }


}