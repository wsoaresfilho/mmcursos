{{ config('app.name', 'Laravel') }}
@extends('layouts.app')
@section('content')

@if ( Session::get('message'))
    <div class="alert alert-success"> {{ Session::get('message') }} </div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">CONTEÚDOS</div>
            <div class="table-responsive">
                <table class="table table-hover manage-u-table">
                    <thead>
                        <tr>
                            <th width="70" class="text-center">#</th>
                            <th>NOME</th>
                            <th>CURSO</th>
                            <th>ARQUIVO</th>
                            <th>DESCRIÇÃO</th>
                            <th width="300">DELETAR</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($conteudos as $conteudo)
                        <tr>
                            <td>{{$conteudo->id}}</td>
                            <td><a href="/conteudos/edit/{{ $conteudo->id }}">{{ $conteudo->nome }}</a></td>
                            <td>{{$conteudo->curso}}</td>
                            <td>{{ $conteudo->arquivo }}</td>
                            <td>{{ $conteudo->descricao }}</td>
                            <td><a href="/conteudos/delete/{{ $conteudo->id }}">Remover</a></td>
                            <hr>
                        </tr>
                        {{-- <video width="400" controls>
                          <source src="/arquivos/{{ $conteudo->arquivo }}" type="video/mp4">
                          Your browser does not support HTML5 video.
                        </video> --}}
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<a href="/conteudos/add">Adicionar</a>
@endsection