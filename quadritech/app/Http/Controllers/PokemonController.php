<?php

namespace App\Http\Controllers;

use App\Library\Functions;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Support\Collection;

class PokemonController extends Controller
{
     /**
     * Mostra a lista de pokemons.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Captirua a pagina passada para mostra na tela
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

        //Realiza a busca e seta o id dos pokemons
        foreach($pokemons->results as $i_pokemon => $pokemon){
            //Captura o id atraves da URL de cada pokemon
            $pokemons->results[$i_pokemon]->id =  $funtions->idUrl($pokemon);
        }

        //Incluindo o total de resultados para serem paginados via Paginate collection
        $pokemons = (new Collection($pokemons->results))->paginate(10, null, $page);

        //Seta o paginator para usar o estilo bootstrap-4
        $pokemons->useBootstrap();

        return view('Pokemons.index', [
            'pokemons'=>$pokemons
            ]
        );
            
    }

    /**
     * Mostra as informações de um pokemons escolhido.
     * Recebe um request com o id do pokemon
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)  
    {
        //Captura id do pokemon
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
        
        //Buscar as habilidades do pokemon em um array
        $array_ability = array();
        foreach($pokemon->abilities as $ability)
            $array_ability[] = ucfirst($ability->ability->name);

        //Monta um array com as caractersiticas e nome do pokemon para passar para a view
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
