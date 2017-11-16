@extends('layouts.app')

@section('content')

<div class="">
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
                            <h2>Aula: {{$aula->nome}}</h2>
                            <video controls>
                                <source src="/arquivos/{{ $aula->arquivo }}" type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                            <br/><br/>
                            <p>{{$aula->descricao}}</p>
                        </div>

                        <div class="col-sm-4">
                            <ul class="list-group list-group-full">
                            @foreach ($conteudos as $conteudo)
                                <a href="/aulas/{{$curso->curso_id}}/{{$conteudo->id}}/{{$aula->id}}">
                                    <?php
                                    $active = "";
                                    if ($aula->id == $conteudo->id) $active = "active";
                                    if (in_array($conteudo->id, $assistidos)) { ?>
                                        <li class="list-group-item {{$active}}" >
                                            <span class="badge badge-success">+</span>
                                            {{$conteudo->nome}}
                                        </li>
                                    <?php } else { ?>
                                        <li class="list-group-item {{$active}}" >
                                            <span class="badge badge-danger">-</span>
                                            {{$conteudo->nome}}
                                        </li>
                                    <?php } ?>
                                </a>
                            @endforeach
                            @if (count(array_intersect($assistidos, $paracertificado)) == count($paracertificado))
                                <a href="/certificado/{{$curso->curso_id}}}">
                                    <li class="list-group-item" >
                                        Certificado
                                    </li>
                                </a>
                            @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection