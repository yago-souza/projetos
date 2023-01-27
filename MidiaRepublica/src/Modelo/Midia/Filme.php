<?php

class Filme extends Obra
{

    private string $titulo;
    private array $autor;
    private array $genero;
    private int $faixaEtaria;
    private string $lancamento;
    private array $personagens;
    private array $nota;
    private array $premios;

    public function __construct(string $titulo,
                                array $autor,
                                array $genero,
                                int $faixaEtaria,
                                string $lancamento,
                                array $personagens,
                                array $nota,
                                array $premios)
    {
        __construct($titulo, $autor, $genero, $faixaEtaria, $lancamento, $personagens, $nota, $premios);
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->genero = $genero;
        $this->faixaEtaria = $faixaEtaria;
        $this->lancamento = $lancamento;
        $this->personagens = $personagens;
        $this->nota = $nota;
        $this->premios = $premios;
    }

}

/*
 * Filmes
                                Titulo: array
                                lançamento: string
                                ## um array com objetos dentro
                                Ator: arrayPessoa[] Objetoessoa {
                                                    Nome,
                                                    nascimento,
                                                    naturalidade,
                                                    ocupação(ator, diretor, escritor),
                                                    filmes,
                                                }

                                Diretor: arrayPessoa[]
                                Escritor: arrayPessoa[]

                                Produtora: objeto produtora

                                trilha sonora: Pessoa
                                genero array
                                descrição{}
                                Avaliação objeto {
                                    AVALIADOR (IMDB, RT, ETC)
                                    NOTA
                                }
                                personagens objeto {
                                    Personagem
                                    Ator
                                }
                                premiaçoes objeto{

                                    Premio objeto{
                                        (Oscar, canes, etc)
                                    Indicaçoes int
                                    Vitorias string (Melhor filme, melhor ator, etc)
                                    }

                                }
                                faixa etaria int



    {
        "adult":false,
        "backdrop_path":"/nlCHUWjY9XWbuEUQauCBgnY8ymF.jpg",
        "belongs_to_collection":{"id":8945,"name":"Mad Max: Coleção","poster_path":"/bmzns8d1tz3P2EWoz2JQeqnu9Ck.jpg","backdrop_path":"/gwYe803SFwKlCF5y71OicWHUnVD.jpg"},
        "budget":150000000,
"genres":[{"id":28,"name":"Ação"},
{"id":12,"name":"Aventura"},
{"id":878,"name":"Ficção científica"}],
"homepage":"https://www.warnerbros.com.br/filmes/mad-max-estrada-da-furia",
"id":76341,"imdb_id":"tt1392190",
"original_language":"en",
"original_title":"Mad Max: Fury Road",
"overview":"Em um mundo apocalíptico, Max Rockatansky acredita que a melhor forma de sobreviver é não depender de ninguém. Porém, após ser capturado pelo tirano Immortan Joe e seus rebeldes, Max se vê no meio de uma guerra mortal, iniciada pela imperatriz Furiosa que tenta salvar um grupo de garotas. Também tentando fugir, Max aceita ajudar Furiosa. Dessa vez, o tirano Joe está ainda mais implacável pois teve algo insubstituível roubado.",
"popularity":58.688,
"poster_path":"/tH64gzAHDFg7EFcgfkkZyHdGM5P.jpg",
"production_companies":[{"id":79,"logo_path":"/tpFpsqbleCzEE2p5EgvUq6ozfCA.png",
"name":"Village Roadshow Pictures","origin_country":"US"},
{"id":174,"logo_path":"/IuAlhI9eVC9Z8UQWOIDdWRKSEJ.png",
"name":"Warner Bros. Pictures",
"origin_country":"US"},
{"id":2537,"logo_path":null,"name":"Kennedy Miller Productions","origin_country":"AU"},
{"id":41624,"logo_path":"/wzKxIeQKlMP0y5CaAw25MD6EQmf.png",
"name":"RatPac Entertainment","origin_country":"US"}],
"production_countries":[{"iso_3166_1":"AU","name":"Australia"},
{"iso_3166_1":"US","name":"United States of America"},
{"iso_3166_1":"ZA","name":"South Africa"}],
"release_date":"2015-05-13",
"revenue":378858340,
"runtime":120,
"spoken_languages":[{"english_name":"English","iso_639_1":"en","name":"English"}],
"status":"Released","tagline":"Só os loucos sobrevivem.",
"title":"Mad Max: Estrada da Fúria",
"video":false,"vote_average":7.57,"vote_count":20229}




*/