{{ config('app.name', 'Laravel') }}
@extends('layouts.app')
@section('content')
{{ Session::get('message') }}

 <div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Editar Curso</h3>
            <Br>
            {!! Form::open(array('route' => ['cursosupdate', $curso->curso_id ],'enctype' => 'multipart/form-data')) !!}
                <div class="form-group">
                    <label class="col-md-12">Nome</label>
                    <div class="col-md-12">
                        <input type="text" name="nome" class="form-control" value="{{ $curso->nome }}">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Categoria</label>
                    <div class="col-md-12">
                        <select name="categoria" class="form-control select2" data-style="form-control">
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}" {{$categoria->id == $curso->categoria_id ? 'selected="selected"' : ''}}">{{$categoria->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-12">Imagem</label>
                    <div class="col-md-12">
                         {!! Form::file('image', array('class' => 'image')) !!}
                    </div>
                </div>      
                <div class="form-group">
                    <label class="col-md-12">Descrição</label>
                    <div class="col-md-12">
                        <textarea class="form-control" name="descricao" rows="5">{{ $curso->descricao }}</textarea>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn waves-effect waves-light btn-info">Salvar</button>
             {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection