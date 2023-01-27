<?php

require_once './src/Modelo/Midia/Obra.php';
require_once 'src/Modelo/Midia/Filme.php';

$teste = new Obra('Avatar',
                        ['Yago'],
                        ['Ação'],
                        14,
                        '26/09/2000',
                        ['Yago', 'isabele'],
                        [10, 7],
                        ['Oscar']);

$teste2 = new Filme('Avatar', 'Yago', 'Ação', '12+', '23/2/22','teste', 10, 'Oscar']);

var_dump($teste2);




