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
                            <video id="video" controls preload="auto">
                                <source src="/arquivos/{{ $aula->arquivo }}" type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                            <br/><br/>
                            <p>{{$aula->descricao}}</p>
                        </div>

                        <div class="col-sm-4">
                            <ul class="list-group list-group-full">
                            @foreach ($conteudos as $conteudo)
                                <a class="send_link" href="/aulas/{{$curso->curso_id}}/{{$conteudo->id}}/{{$aula->id}}/f">
                                    <?php
                                    $active = "";
                                    if ($aula->id == $conteudo->id) $active = "active";
                                    if (in_array($conteudo->id, $assistidos)) { ?>
                                        <li id="aula_link_{{$conteudo->id}}" class="aula_link list-group-item {{$active}}">
                                            <span class="badge badge-success">+</span>
                                            {{$conteudo->nome}}
                                        </li>
                                    <?php } else { ?>
                                        <li id="aula_link_{{$conteudo->id}}" class="aula_link list-group-item {{$active}}">
                                            <span class="badge badge-danger">-</span>
                                            {{$conteudo->nome}}
                                        </li>
                                    <?php } ?>
                                </a>
                            @endforeach
                                <a id="certificado" href="/certificado/{{$curso->curso_id}}}">
                                    <li class="list-group-item" >
                                        Certificado
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
<script type="text/javascript">
    window.onload = function() {
        var video = document.getElementById("video");
        video.addEventListener("ended", function() {
            var send_link = document.getElementsByClassName("send_link");

            for (var i = 0; i < send_link.length; i++) {
                var target = send_link[i].href.substr(0, send_link[i].href.length-2) + "/t";
                send_link[i].href = target;
            }

            $("#aula_link_{{$aula->id}}").removeClass("active");
            var aula_link = $("#aula_link_{{$aula->id}} span");
            aula_link.removeClass("badge-danger");
            aula_link.addClass("badge-success");
            aula_link.text("+");

            $.get( "/aulas/{{$curso->curso_id}}/{{$conteudo->id}}/{{$aula->id}}/t", function( data ) {
            });
        });
    }
</script>

@endsection