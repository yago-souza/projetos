<?php
require_once './src/Modelo/Endereco.php';
require_once './conexao.php';

function consultaSQL ($conexao, $sql){
    $up = oci_parse($conexao, $sql);
    oci_execute($up);
    $retornoSql = oci_fetch_array($up);
    return $retornoSql;
}

$client = new SoapClient('https://apphom.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl');
$function = 'consultaCEP';

$sql = "SELECT MAX(ID)
               FROM S_CEP";
$retornoSql = consultaSQL($conexao, $sql);
$ultimoID = $retornoSql[0];

$sql = "SELECT CEP
               FROM S_CEP
               WHERE ID = '$ultimoID'";
$retornoSql = consultaSQL($conexao, $sql);
$ultimoCEP = $retornoSql[0];
#var_dump($retornoSql);

    for ($i = $ultimoCEP; $i<=99999999; $i++) {

        $id = $ultimoID++;
        #var_dump($i);

        $cep = str_pad($i, '8', '0', STR_PAD_LEFT);
        ##Consulta CEP na view SPL_S_CEP pelo ID
        $sql = "SELECT A.*,
                       ROWNUM
                       FROM S_CEP A
                       WHERE CEP = '$cep'
                       ";
        $retornoSql = consultaSQL($conexao, $sql);
        #$cepSql = $retornoSql['CEP'];

            if($retornoSql == false) {
                try {
                    $arguments = array('consultaCEP' => array('cep' => $cep));
                    $result = $client->__soapCall($function, $arguments);
                    #var_dump($result);
                    if ($result == new stdClass()) {
                        throw new \Exception("Objeto vazio");
                    } else {
                        echo "<p>Sem erro</p>";
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
                                                              '$id'
                                                            )";
                        $insertSql = consultaSQL($conexao, $sql);

                        echo "Retorno do Correio: ". $cepS . ', ' . $endS . ', '. $bairroS . ', ' . $cidadeS . ', ' . $ufS . ', ' . $complemento2S;
                    }
                } catch (\Exception $exception) {
                    echo $exception->getMessage() . PHP_EOL;
                }
        }
    }


        /*
        ##Consulta CEP na tabela S_CEP pelo CEP
        $sql = "SELECT A.*
                           FROM S_CEP A
                           WHERE CEP = '$cepSql'";
        $retornoS_CEP = consultaSQL($conexao, $sql);

        ## Se o cep existir pula para o próximo cep
        if ($retornoS_CEP != false) {
            /*#echo "<h2>O CEP ". $retornoSql['CEP'] . " já existe na tabela S_CEP.</h2>";
            #echo "<p>Endereço antigo (SPL_S_CEP): " .
                $retornoSql['ID'] . " " .
                $retornoSql['CEP_STREET'] . ", " .
                $retornoSql['CEP_BAIRRO'] . ", " .
                $retornoSql['CEP_CITY'] . ", " .
                $retornoSql['CEP_STATE'] . ", " .
                $retornoSql['CEP'] . ", " .
                $retornoSql['CEP_ROTA'] . "</p>";

            #echo "<p>Endereço novo (S_CEP): " . " " .
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
                    echo "Retorno do Correio: ". $cepS . ', ' . $endS . ', '. $bairroS . ', ' . $cidadeS . ', ' . $ufS . ', ' . $complemento2S;
                }
            } catch (\Exception $exception) {
                echo $exception->getMessage() . PHP_EOL;
            }
        }
    }
*/
#}



