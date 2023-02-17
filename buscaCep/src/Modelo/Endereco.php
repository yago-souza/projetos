<?php

class Endereco
{

    protected $cep;
    protected $end;
    protected $bairro;
    protected $cidade;
    protected $uf;
    protected $complemento2;

    public function __construct(string $cep,
                                string $end,
                                string $complemento2,
                                string $bairro,
                                string $cidade,
                                string $uf)
    {
        $this->cep = $cep;
        $this->end = $end;
        $this->complemento2 = $complemento2;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;

    }

    /**
     * @return string
     */
    public function getComplemento2(): string
    {
        return $this->complemento2;
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
     * @param string $end
     * @return Endereco
     */
    public function setEnd(string $end): Endereco
    {
        $this->end = $end;
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
     * @param string $cidade
     * @return Endereco
     */
    public function setCidade(string $cidade): Endereco
    {
        $this->cidade = $cidade;
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
    public function getEnd(): string
    {
        return $this->end;
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
    public function getCidade(): string
    {
        return $this->cidade;
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