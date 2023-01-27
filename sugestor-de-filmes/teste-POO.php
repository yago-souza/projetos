<?php

require_once 'funcoes.php';
require_once 'Filme.php';

$APIkey = '96007ba9';

$url = "http://www.omdbapi.com/?i=$stringIMDBid&apikey=$APIkey&plot=full";