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
for ($i = 19499999; $i<=19749999; $i++) {
    echo"<p>$i</p>";
    $cep = str_pad($i, '8', '0', STR_PAD_LEFT);
    #echo $cep . PHP_EOL;
    $sql = "SELECT A.*,
                       ROWNUM
                       FROM S_CEP A
                       WHERE CEP = '$cep'
                       ";
    $retornoSql = consultaSQL($conexao, $sql);

    if ($retornoSql == false) {
        try {
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
                #echo "Retorno do Correio: ". $cepS . ', ' . $endS . ', '. $bairroS . ', ' . $cidadeS . ', ' . $ufS . ', ' . $complemento2S;
                /*$string = $cepS . ';' . $endS . ';' . $bairroS . ';' . $cidadeS . ';' . $ufS . ';' . $complemento2S . ';' . $i . ';' . PHP_EOL;
                $arquivoTexto = fopen('crescente.txt', 'a+');
                fwrite($arquivoTexto, $string);
                fclose($arquivoTexto);*/
                $sql = "INSERT INTO S_CEP VALUES (
                                                              '$cepS',
                                                              '$cidadeS',
                                                              '$ufS',
                                                              '$endS',
                                                              '$bairroS',
                                                              null,
                                                              '$complemento2S',
                                                              1
                                                            )";
                $insertSql = consultaSQL($conexao, $sql);
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage() . PHP_EOL;
        }
    }
}

