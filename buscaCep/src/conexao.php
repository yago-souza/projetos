<?php
date_default_timezone_set('America/Sao_Paulo');
set_time_limit(9999);
$conexao = oci_connect('gldev', 'manager', '192.100.100.245/GLDEV', 'AL32UTF8');

if (!$conexao) {
    $erro = oci_error();
    trigger_error(htmlentities($erro['message'], ENT_QUOTES), E_USER_ERROR);
    exit();
}

?>