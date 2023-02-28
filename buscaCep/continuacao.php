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

    for ($i = $ultimoCEP; $i<=99999999; $i++) {
        $id = $ultimoID++;
        $cep = str_pad($i, '8', '0', STR_PAD_LEFT);
        ##Consulta CEP na view SPL_S_CEP pelo ID
        $sql = "SELECT A.*,
                       ROWNUM
                       FROM S_CEP A
                       WHERE CEP = '$cep'
                       ";
        $retornoSql = consultaSQL($conexao, $sql);

            if($retornoSql == false) {
                try {
                    $arguments = array('consultaCEP' => array('cep' => $cep));
                    $result = $client->__soapCall($function, $arguments);
                    #var_dump($result);
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
                                                              '$id'
                                                            )";
                        $insertSql = consultaSQL($conexao, $sql);
                        #echo "Retorno do Correio: ". $cepS . ', ' . $endS . ', '. $bairroS . ', ' . $cidadeS . ', ' . $ufS . ', ' . $complemento2S;
                    }
                } catch (\Exception $exception) {
                    echo $exception->getMessage() . PHP_EOL;
                }
        }
    }

