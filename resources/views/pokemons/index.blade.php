@extends('adminlte::page')

@section('title', 'Pokémons')

@section('content_header')
<h1>Lista de Pokémons</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
            @foreach($pokemons->items() as $cp => $pokemon)
                <tr>
                    <td>{{ $pokemon->id }}</td>
                    <td>{{ ucfirst($pokemon->name) }}</td>
                    <td><a href="#" onclick="mostrarPokemon({{ $pokemon->id }})"> Visualizar</a></td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class='d-flex justify-content-center'>{{$pokemons->links()}}</div>
    
</div>
@include('modal')

@endsection
@section('js')
    <script>
    /*
     * Function que mostra o pokémon
    */
    function mostrarPokemon(id){
        //Inclui o loading no modal
        $( "#conteudo" ).html('<div class="d-flex justify-content-center m-5"><span class="m-2">Carregando...</span><div class="spinner-border m-2" role="status"></div></div>');
        
        //Abre o modal
        $("#myModal").modal('show');

        //Carrega o conteúdo e inclui o mesmo no modal com o perfil do pokémon
        $.ajax({
            url: "{{ Route('pokemons.show') }}?id="+id
        }).done(function( html ) {
            $( "#conteudo" ).html( html );
        });
    }
    </script>
@endsection