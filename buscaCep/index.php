<?php

require_once './src/Modelo/Endereco.php';
require_once './conexao.php';


function buscaCep($conexao){

    for ($i = 0; $i<=5; $i++) {
        echo "<p>$i</p>";
        $sql = "SELECT A.*,
                   ROWNUM
                   FROM SPL_S_CEP A
                   WHERE ID = '$i'";
        $retornoSql = consultaSQL($conexao, $sql);

        $cepSql = $retornoSql['CEP'];
        echo "Cep consultado $cepSql" . PHP_EOL;
        var_dump($retornoSql);

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
                }
            } catch (\Exception $exception) {
                echo $exception->getMessage() . PHP_EOL;
            }
        } else {
            echo "<p>COM ERRO</p>";
        }
    }
}

function consultaSQL ($conexao, $sql){
    $up = oci_parse($conexao, $sql);
    oci_execute($up);
    $retornoSql = oci_fetch_array($up);
    return $retornoSql;
}

$enderco = buscaCep($conexao);








