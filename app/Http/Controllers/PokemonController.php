<?php

namespace App\Http\Controllers;

use App\Library\Functions;
use App\Support\Collection;
use GuzzleHttp\Client;
use Illuminate\Http\Request;


class PokemonController extends Controller
{
     /**
     * Mostra a lista de pokémons.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Captura a página passada para mostrar na tela
        $page = (int)$request->input('page');

        //Url principal da API
        $url = 'http://pokeapi.co';
        
        //Inicia um client do GuzzleHttp
        $client = new Client([
            'base_uri'=>$url,
            'timeout'=> 2.0
        ]);
        
        //Executa o request tipo GET da API
        $requeste = $client->request('GET', 'api/v2/pokemon/?limit=1118');

         //Pega os valores da API e converte em um objeto de arrays
        $pokemons = json_decode($requeste->getBody()->getContents());

        //Cria um objeto de funções padrões 
        $funtions = new Functions();

        //Realiza a busca e seta o id dos pokémons
        foreach($pokemons->results as $i_pokemon => $pokemon){
            //Captura o id atraves da URL de cada pokemon
            $pokemons->results[$i_pokemon]->id =  $funtions->idUrl($pokemon);
        }

        //Inclui o total de resultados para serem paginados via Paginate collection
        $pokemons = (new Collection($pokemons->results))->paginate(10, null, $page);

        //Seta o paginator para usar o estilo bootstrap-4
        $pokemons->useBootstrap();

        return view('Pokemons.index', [
            'pokemons'=>$pokemons
            ]
        );
    }

    /**
     * Mostra as informações de um pokémon escolhido.
     * Recebe um request com o id do pokémon
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)  
    {
        //Captura id do pokémon
        $id = $request->input('id');

        //Url principal da API
        $url = 'http://pokeapi.co';
        
        //Inicia um client do GuzzleHttp
        $client = new Client([
            'base_uri'=>$url,
            'timeout'=> 2.0
        ]);
       
        //Executa o request tipo GET da API
        $requeste = $client->request('GET', 'api/v2/pokemon/'.$id);

        //Pega os valores da API e converte em um objeto de arrays
        $pokemon = json_decode($requeste->getBody()->getContents());
        
        //Busca as habilidades do pokémon em um array
        $array_ability = array();
        foreach($pokemon->abilities as $ability)
            $array_ability[] = ucfirst($ability->ability->name);

        //Monta um array com as características e nome do pokémon para passar para a view
        $array_pokemon = [
            'name'=>ucfirst($pokemon->name),
            'abilities'=>implode(' - ', $array_ability),
            'heigth'=>$pokemon->height,
            'species'=>ucfirst($pokemon->species->name),
            'image'=>$pokemon->sprites->front_default
        ];
        
        return view('Pokemons.showPokemon', ['pokemon'=>$array_pokemon]);
    }
}