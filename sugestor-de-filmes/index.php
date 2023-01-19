<?php

require_once 'funcoes.php';

# Chave da API IMDB
$APIkey = '96007ba9';

        limpaTerminal();

        # Cria um array com ID dos 250 melhores filmes segundo IMDB
        $listaFilmes = file('250-melhores-IMDB.txt', FILE_IGNORE_NEW_LINES);

        echo "Título do filme:\n";
            # Recebe uma string digitada pelo usuario
            $teclado = fopen('php://stdin', 'r');
                # Tira a quebra de texto do input do teclado e armazena na variavel
                $tituloInput = trim(fgets($teclado));
                    # Trata o titulo para ficar no formato da URL e armazena na variavel
                    $tituloFormatado = str_replace(' ', '+', $tituloInput);

        limpaTerminal();

        # Se o campo de imput for diferente de vazio a pesquisa será feita por titulo senão será uma pesquisa entre os 250 melhores filmes do IMDB
        if ($tituloInput != "") {
            # URL para pesquisa por titulo
            $url = "http://www.omdbapi.com/?t=$tituloFormatado&apikey=$APIkey&plot=full";
            retornaFilme($url);
        } else {
            # Gera um número aleatório entre 0 e 250
            $numAleatorio = mt_rand(0,249);
            # Recebe um ID aleatorio da lista de array
            $stringIMDBid = $listaFilmes[$numAleatorio];

            # URL para pesquisa aleatoria
            $url = "http://www.omdbapi.com/?i=$stringIMDBid&apikey=$APIkey&plot=full";
            retornaFilme($url);
        }

        novaDica($listaFilmes, $APIkey);

        percorreFilme();