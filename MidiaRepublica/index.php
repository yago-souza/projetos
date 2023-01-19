<?php

require_once './src/Modelo/Filme.php';

$avatar = new Filme(
    'Avatar',
    'Yago',
    'Vitoria',
    'Maria e Ana',
    'teste',
    'teste',
    5,
    100,
    'teste' );




echo $avatar->getTitulo();