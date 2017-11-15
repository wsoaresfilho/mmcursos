@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Curso: {{$curso->nome}}</h1>
                    <p>{{$curso->descricao}}</p>
                    <hr/>

                    <div class="row">
                        <div class="col-sm-8">
                            <video controls>
                                <source src="/arquivos/{{ $aula->arquivo }}" type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                        </div>

                        <div class="col-sm-4">
                            <ul class="list-group list-group-full">
                            @foreach ($conteudos as $conteudo)
                                <a href="/aulas/{{$curso->curso_id}}/{{$conteudo->id}}">
                                    <li class="list-group-item" >
                                        <span class="badge badge-success">+</span>
                                        {{$conteudo->nome}}
                                    </li>
                                </a>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection