<?php

require_once './src/Modelo/Midia/Obra.php';

$teste = new Obra('Avatar',
                        ['Yago'],
                        ['Ação'],
                        14,
                        '26/09/2000',
                        ['Yago', 'isabele'],
                        [10, 7],
                        ['Oscar']);

var_dump($teste);




