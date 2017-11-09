{{ config('app.name', 'Laravel') }}
@extends('layouts.app')
@section('content')

@if ( Session::get('message'))
    <div class="alert alert-success"> {{ Session::get('message') }} </div>
@endif


<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">CATEGORIAS</div>
            <div class="table-responsive">
                <table class="table table-hover manage-u-table">
                    <thead>
                        <tr>
                            <th width="70" class="text-center">#</th>
                            <th>NOME</th>
                            <th>DESCRIÇÃO</th>
                            <th width="300">DELETAR</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($categorias as $categoria)
                        <tr>

                            <td>{{$categoria->id}}</td>
                            <td><a href="/categorias/edit/{{ $categoria->id }}">{{ $categoria->nome }}</a></td>
                            <td>{{ $categoria -> descricao }}</td>
                                <td><a href="/categorias/delete/{{ $categoria->id }}">Remover</a></td>

                            <hr>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<a href="/categorias/add">Adicionar</a>
@endsection