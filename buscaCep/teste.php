<?php

require_once './src/Modelo/Endereco.php';
require_once './conexao.php';

echo "Teste";
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