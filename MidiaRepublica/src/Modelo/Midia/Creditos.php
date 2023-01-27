<?php

class Creditos
{

    private Pessoa $pessoa;

    public function __construct(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }
}