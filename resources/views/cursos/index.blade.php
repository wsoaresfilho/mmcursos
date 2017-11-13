{{ config('app.name', 'Laravel') }}
@extends('layouts.app')
@section('content')

@if ( Session::get('message'))
    <div class="alert alert-success"> {{ Session::get('message') }} </div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">CURSOS</div>
            <div class="table-responsive">
                <table class="table table-hover manage-u-table">
                    <thead>
                        <tr>
                            <th width="70" class="text-center">#</th>
                            <th>NOME</th>
                            <th>CATEGORIA</th>
                            <th>DESCRIÇÃO</th>
                            <th width="300">DELETAR</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($cursos as $curso)
                        <tr>
                            <td>{{$curso->curso_id}}</td>
                            <td><a href="/cursos/edit/{{ $curso->curso_id }}">{{ $curso->nome }}</a></td>
                            <td>{{$curso->categoria}}</td>
                            <td>{{ $curso->descricao }}</td>
                                <td><a href="/cursos/delete/{{ $curso->curso_id }}">Remover</a></td>
                            <hr>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<a href="/cursos/add">Adicionar</a>
@endsection