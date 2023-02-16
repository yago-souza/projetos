<?php

$client = new SoapClient('https://apphom.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl');
$function = 'consultaCEP';
$arguments = array('consultaCEP' => array(
    'cep' => '06784180'
));


$result = $client->__soapCall($function, $arguments);
echo 'Response: ';
print_r($result);

