<?php
/**
 * Classe de funções gerais
 */
namespace App\Library;

use GuzzleHttp\Client;
use Illuminate\Pagination\Paginator;

class Functions{

    /**
     * Retorna o ID do pokémon encontrado na URL.
     *
     * @param $pokemon objeto pokemon
     * @return Int
     */
    public function idUrl($pokemon)
    {
        $arr_url = explode('/', $pokemon->url);
        $id = $arr_url[count($arr_url)-2];

        return $id;
    }
} 