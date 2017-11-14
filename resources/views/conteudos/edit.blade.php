{{ config('app.name', 'Laravel') }}
@extends('layouts.app')
@section('content')
{{ Session::get('message') }}

 <div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Editar Conteúdos</h3>
            <Br>
            {!! Form::open(array('route' => ['conteudosupdate', $conteudo->id ],'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')) !!}
                <div class="form-group">
                    <label class="col-md-12">Nome</label>
                    <div class="col-md-12">
                        <input type="text" name="nome" class="form-control" value="{{ $conteudo->nome }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Arquivo</label>
                    <div class="col-md-12">
                         {!! Form::file('arquivo', array('class' => 'image')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Curso</label>
                    <div class="col-md-12">
                        <select name="curso" class="form-control select2" data-style="form-control">
                            @foreach($cursos as $curso)
                                <option value="{{$curso->curso_id}}" {{$curso->curso_id == $conteudo->curso_id ? 'selected="selected"' : ''}}">{{$curso->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Descrição</label>
                    <div class="col-md-12">
                        <textarea class="form-control" name="descricao" rows="5">{{ $conteudo->descricao }}</textarea>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn waves-effect waves-light btn-info">Salvar</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection