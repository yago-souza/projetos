<?php

require_once 'vendor/autoload.php';

require_once 'Filme.php';

use GuzzleHttp\Client;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Symfony\Component\DomCrawler\Crawler;


function limpaTerminal() {
    popen('cls || clear','w');
}

function retornaFilme($url) {

    # Recebe o JSON da API
    $json = file_get_contents($url);
    var_dump($json);
    $arrayFilme = json_decode($json, true);

    $resposta = $arrayFilme['Response'];

    # Trata erro caso o usuário preencha um valor inválido no input
    if ($resposta == "False") {
        echo "Digite um filme válido ou deixe o campo em branco. \n\n";
    } else {
        $filme = new Filme();

        $filme->setTitulo($arrayFilme['Title'])
            ->setLancamento($arrayFilme['Released']);

        $titulo = $arrayFilme['Title'];
        $ano = $arrayFilme['Year'];
        $lancamento = $arrayFilme['Released'];
        $duracao = $arrayFilme['Runtime'];
        $genero = $arrayFilme['Genre'];
        $diretor = $arrayFilme['Director'];
        $atores = $arrayFilme['Actors'];
        $enredo = $arrayFilme['Plot'];
        $cartaz = $arrayFilme['Poster'];
        $notaIMDB = $arrayFilme['Ratings'][0]['Source'];
        $valorIMDB = $arrayFilme['Ratings'][0]['Value'];
        $notaRT = $arrayFilme['Ratings'][1]['Source'];
        $valorRT = $arrayFilme['Ratings'][1]['Value'];

        $traduz = new GoogleTranslate('pt'); #tradus para portugues
        $traduz->setSource();
        $traduz->setTarget('pt');
        $enredoTraduzido = $traduz->translate($enredo);

        $teste = "\n\n Filme: $titulo \n Lançamento: $lancamento \n Duração: $duracao \n" .
            " Diretor: $diretor\n $notaIMDB: $valorIMDB \n $notaRT: $valorRT \n\n $enredoTraduzido \n\n ";
        echo $teste;
        echo "\n $url\n";
    }
}

function novaDica($listaFilmes, $APIkey){
    echo "Quer outra dica?(y/n)\n";
    # Recebe uma string digitada pelo usuario
    $teclado = fopen('php://stdin', 'r');
    # Tira a quebra de texto do input do teclado e armazena na variavel
    $tecladoResposta = trim(fgets($teclado));
    #return $tecladoResposta;

    if ($tecladoResposta == 'y') {
        # Gera um número aleatório entre 0 e 250
        $numAleatorio = mt_rand(0,249);
        popen('cls || clear','w');
        # Recebe um ID aleatorio da lista de array
        $stringIMDBid = $listaFilmes[$numAleatorio];

        # URL para pesquisa aleatoria
        $url = "http://www.omdbapi.com/?i=$stringIMDBid&apikey=$APIkey&plot=full";
        retornaFilme($url);
        novaDica($listaFilmes, $APIkey);
        echo "\n $url\n";
    }
}

function percorreFilme($url, $filtro)
{
    $client = new Client();
    $resposta = $client->request('GET', $url);
    ## Recebe o HTML da página
    $html = $resposta->getBody();
    ## Cria um rastreador
    $crawler = new Crawler();
    ## Adiciona o retorno da pagina HTML ao leitor do dom
    $crawler->addHtmlContent($html);
    ##tag e classe no html que contem os titulos
    $objetoDOM = $crawler->filter($filtro);

    foreach ($objetoDOM as $elemento) {
        $arrayFiltrado[] = $elemento->textContent;
    }
    $texto = $arrayFiltrado;
    return $texto;
}

function buscaImagem($url)
{
    $client = new Client();
    $resposta = $client->request('GET', $url);
    ## Recebe o HTML da página
    $html = $resposta->getBody();
    ## Cria um rastreador
    $crawler = new Crawler();
    ## Adiciona o retorno da pagina HTML ao leitor do dom
    $crawler->addHtmlContent($html);
    ##tag e classe no html que contem os titulos
    $cartaz = $crawler->filter('img.thumbnail-img')->attr('src');
    #var_dump($objetoDOM);
    return $cartaz;
}


$url = 'https://www.adorocinema.com/filmes/filme-1/';
$arrayInfoFilme =  percorreFilme($url, 'div.meta-body-item');
## indice 0
$sinopse = percorreFilme($url,'div.content-txt');
$cartaz = buscaImagem($url);
$titulo = percorreFilme($url, 'div.titlebar-title');
$filme = [
    "tituloBr" => $titulo[0],
    "tituloOriginal" => $arrayInfoFilme[4],
    "sinopse" => $sinopse[0],
    "cartaz" => $cartaz
];

limpaTerminal();

#var_dump($titulo);
#echo PHP_EOL . "Titulo" . PHP_EOL . $filme['tituloBr'] . PHP_EOL . $filme['tituloOriginal'] . PHP_EOL . $filme['sinopse'] . PHP_EOL . $filme['cartaz'];
