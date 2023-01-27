<?php

require_once './src/Modelo/Endereco.php';



$enderco = buscaCep();

function buscaCep(){
    for ($i = 1; $i <= 99999999; $i++) {

        $cep = str_pad($i, '8', '0', STR_PAD_LEFT);

        $url = "https://viacep.com.br/ws/$cep/json/";$url = "https://viacep.com.br/ws/$cep/json/";

        $json = file_get_contents($url);

        $arrayCep = json_decode($json, true);

        if($arrayCep['erro'] = 'true') {
            echo 'Cep inválido' . PHP_EOL;
            ##continue;
        } else {
            $endereco = new Endereco($arrayCep['cep'],
                $arrayCep['logradouro'],
                $arrayCep['complemento'],
                $arrayCep['bairro'],
                $arrayCep['localidade'],
                $arrayCep['uf'],
                $arrayCep['ibge'],
                $arrayCep['gia'],
                $arrayCep['ddd'],
                $arrayCep['siafi']);

            var_dump($endereco);

            #usleep(10000);

            return $endereco;
        }
    }






}








