<?php

require_once './src/Modelo/Endereco.php';
#require_once './conexao.php';

$client = new SoapClient('https://apphom.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl');
$function = 'consultaCEP';
for ($i = 1001000; $i<=99999999; $i++) {
    $cep = str_pad($i,'8','0', STR_PAD_LEFT);
    echo $cep . PHP_EOL;
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
            echo "Retorno do Correio: ". $cepS . ', ' . $endS . ', '. $bairroS . ', ' . $cidadeS . ', ' . $ufS . ', ' . $complemento2S;
        }
    } catch (\Exception $exception) {
        echo $exception->getMessage() . PHP_EOL;
    }
    #sleep(1);
}
/*


$sql = "SELECT A.*,
                       ROWNUM
                       FROM S_PEDIDO A
                       WHERE ID = '$i'
                       ";
$retornoSql = consultaSQL($conexao, $sql);
var_dump($retornoSql);


function consultaSQL ($conexao, $sql){
    $up = oci_parse($conexao, $sql);
    oci_execute($up);
    $retornoSql = oci_fetch_array($up);
    return $retornoSql;
}
*/