<?php

require_once './src/Modelo/Endereco.php';
#require_once './conexao.php';

for ($i = 1000000; $i<=99999999; $i++) {
    $cep = str_pad($i,'8','0', STR_PAD_LEFT);

    echo $cep . PHP_EOL;
    sleep(1);
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