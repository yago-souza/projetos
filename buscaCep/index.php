<?php

require_once './src/Modelo/Endereco.php';
require_once './conexao.php';


function buscaCep($conexao){

    for ($i = 0; $i<=722053; $i++) {
        echo "<p>$i</p>";
        //Consulta CEP da view SPL_S_CEP
        $sql = "SELECT A.*,
                   ROWNUM
                   FROM SPL_S_CEP A
                   WHERE ID = '$i'";
        $retornoSql = consultaSQL($conexao, $sql);

        $cepSql = $retornoSql['CEP'];
        echo "Cep consultado $cepSql" . PHP_EOL;
        #var_dump($retornoSql);
        //Consulta se esse CEP existe na tabela S_CEP
        $sql = "SELECT A.*
                   FROM S_CEP A
                   WHERE CEP = '$cepSql'";
        $retornoS_CEP = consultaSQL($conexao, $sql);
        #var_dump($retornoS_CEP);

        if($retornoSql != false) {
            echo "<p>Sem erro</p>";
            try {
                #$cep = str_pad($i, '8', '0', STR_PAD_LEFT);
                $cep = $retornoSql['CEP'];
                echo "O CEP é $cep";
                #echo $cep . PHP_EOL;
                $client = new SoapClient('https://apphom.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl');
                $function = 'consultaCEP';
                $arguments = array('consultaCEP' => array('cep' => $cep));

                $result = $client->__soapCall($function, $arguments);

                if ($result == new stdClass()) {
                    throw new \Exception("Objeto vazio");
                } else {

                $endereco = new Endereco(
                    $result->return->cep,
                        $result->return->end,
                            $result->return->complemento2,
                                $result->return->bairro,
                                    $result->return->cidade,
                                        $result->return->uf
                                        );

                $cepS = $endereco->getCep();
                    $endS = $endereco->getEnd();
                        $complemento2S = $endereco->getComplemento2();
                            $bairroS = $endereco->getBairro();
                                $cidadeS = $endereco->getCidade();
                                    $ufS = $endereco->getUf();
                    #print_r($endereco);
                    $sql = "INSERT INTO S_CEP VALUES (
                                          '$cepS',
                                          '$cidadeS',
                                          '$ufS',
                                          '$endS',
                                          '$bairroS',
                                          null,
                                          '$complemento2S'
                                        )";
                    $insertSql = consultaSQL($conexao, $sql);

                    unset($endereco, $cepS, $complemento2S, $bairroS, $cidadeS, $ufS, $insertSql);
                }
            } catch (\Exception $exception) {
                echo $exception->getMessage() . PHP_EOL;
            }
        } else {
            echo "<p>COM ERRO</p>";
        }
        unset($retornoSql);
    }
}

function consultaSQL ($conexao, $sql){
    $up = oci_parse($conexao, $sql);
    oci_execute($up);
    $retornoSql = oci_fetch_array($up);
    return $retornoSql;
}

#$enderco = buscaCep($conexao);


$client = new SoapClient('https://apphom.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl');
$function = 'consultaCEP';

for ($i = 0; $i<=722053; $i++) {
    ##Consulta CEP na view SPL_S_CEP pelo ID
        $sql = "SELECT A.*,
                       ROWNUM
                       FROM SPL_S_CEP A
                       WHERE ID = '$i'
                       --WHERE ID = '68004'";
            $retornoSql = consultaSQL($conexao, $sql);
                $cepSql = $retornoSql['CEP'];

    ##Consulta CEP na tabela S_CEP pelo CEP
        $sql = "SELECT A.*
                       FROM S_CEP A
                       WHERE CEP = '$cepSql'";
            $retornoS_CEP = consultaSQL($conexao, $sql);

    ## Se o cep existir pula para o próximo cep
        if ($retornoS_CEP != false) {
            echo "<h2>O CEP ". $retornoSql['CEP'] . " já existe na tabela S_CEP.</h2>";
            echo "<p>Endereço antigo (SPL_S_CEP): " .
                $retornoSql['ID'] . " " .
                $retornoSql['CEP_STREET'] . ", " .
                $retornoSql['CEP_BAIRRO'] . ", " .
                $retornoSql['CEP_CITY'] . ", " .
                $retornoSql['CEP_STATE'] . ", " .
                $retornoSql['CEP'] . ", " .
                $retornoSql['CEP_ROTA'] . "</p>";

            echo "<p>Endereço novo (S_CEP): " . " " .
                $retornoS_CEP['CEP_STREET'] . ", " .
                $retornoS_CEP['CEP_BAIRRO'] . ", " .
                $retornoS_CEP['CEP_CITY'] . ", " .
                $retornoS_CEP['CEP_STATE'] . ", " .
                $retornoS_CEP['CEP'] . " " .
                $retornoS_CEP['CEP_ROTA'] . " " .
                $retornoS_CEP['OBSERVACAO'] . "</p>";
        } else {
            #echo "<p>O CEP ". $retornoSql['CEP'] . " não existe na tabela S_CEP.</p>";
                ## consulta o número do CEP no Web Service
                try {
                            $arguments = array('consultaCEP' => array('cep' => $cepSql));
                                $result = $client->__soapCall($function, $arguments);
                    if ($result == new stdClass()) {
                        throw new \Exception("Objeto vazio");
                    } else {
                        $endereco = new Endereco(
                            $result->return->cep,
                                $result->return->end,
                                    $result->return->complemento2,
                                        $result->return->bairro,
                                            $result->return->cidade,
                                                $result->return->uf
                                                );
                            $cepS = $endereco->getCep();
                                $endS = $endereco->getEnd();
                                    $complemento2S = $endereco->getComplemento2();
                                        $bairroS = $endereco->getBairro();
                                            $cidadeS = $endereco->getCidade();
                                                $ufS = $endereco->getUf();
                        ## Inserer as informaçoes na tabela S_CEP
                        $sql = "INSERT INTO S_CEP VALUES (
                                                  '$cepS',
                                                  '$cidadeS',
                                                  '$ufS',
                                                  '$endS',
                                                  '$bairroS',
                                                  null,
                                                  '$complemento2S',
                                                  '$i'
                                                )";
                            $insertSql = consultaSQL($conexao, $sql);
                        #echo "Retorno do Correio: ". $cepS . ', ' . $endS . ', '. $bairroS . ', ' . $cidadeS . ', ' . $ufS . ', ' . $complemento2S;
                    }
                } catch (\Exception $exception) {
                    echo $exception->getMessage() . PHP_EOL;
                }
        }
        echo "<p>$i $cepSql</p>";
    unset($endereco, $cepS, $endS, $complemento2S, $bairroS, $cidadeS, $ufS, $result, $cepSql, $retornoS_CEP, $retornoSql, );
}






