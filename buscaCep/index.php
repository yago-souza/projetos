<?php

require_once './src/Modelo/Endereco.php';



$enderco = buscaCep();

function buscaCep(){
    for ($i = 6784000; $i <= 99999999; $i++) {

        try {
            $cep = str_pad($i, '8', '0', STR_PAD_LEFT);
            echo $cep . PHP_EOL;
            $client = new SoapClient('https://apphom.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl');
            $function = 'consultaCEP';
            $arguments = array('consultaCEP' => array(
                'cep' => $cep #'06754-910'
            ));

            $result = $client->__soapCall($function, $arguments);
            if ($result == new stdClass()){
                throw new \Exception("Objeto vazio");
            }
            echo 'Response: ' . PHP_EOL;
            print_r($result);
            #sleep(1);
        } catch (\Exception $exception) {
            echo $exception->getMessage() . PHP_EOL;
        }


        /*
        $url = "https://viacep.com.br/ws/$cep/json/";

        $json = file_get_contents($url);

        $arrayCep = json_decode($json, true);

        if($arrayCep['erro'] = 'true') {
            echo $i . 'Cep inválido' . PHP_EOL;
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
        */
    }
}









