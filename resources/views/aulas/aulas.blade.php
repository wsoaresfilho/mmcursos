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
                            <br/><br/>
                            <p>{{$aula->descricao}}</p>
                        </div>

                        <div class="col-sm-2">
                            <ul class="list-group list-group-full">
                            @foreach ($conteudos as $conteudo)
                                <a href="/aulas/{{$curso->curso_id}}/{{$conteudo->id}}/{{$aula->id}}">
                                    <?php if (in_array($conteudo->id, $assistidos)) { ?>
                                        <li class="list-group-item" >
                                            <span class="badge badge-success">+</span>
                                            {{$conteudo->nome}}
                                        </li>
                                    <?php } else { ?>
                                        <li class="list-group-item" >
                                            <span class="badge badge-danger">-</span>
                                            {{$conteudo->nome}}
                                        </li>
                                    <?php } ?>
                                </a>
                            @endforeach
                            <a><li class="list-group-item" >
                                            <a href=/certificado/{{$curso->curso_id}}}>
                                            Certificado
                                            </a>
                                        </li>
                            </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection