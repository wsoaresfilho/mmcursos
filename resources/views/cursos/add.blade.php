{{ config('app.name', 'Laravel') }}
@extends('layouts.app')
@section('content')
{{ Session::get('message') }}

 <div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Adicionar Cursos</h3>
            <br>
            {!! Form::open(array('route' => 'cursosstore','enctype' => 'multipart/form-data')) !!}
                <div class="form-group">
                    <label class="col-md-12">Nome</label>
                    <div class="col-md-12">
                        <input type="text" name="nome" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Imagem</label>
                    <div class="col-md-12">
                         {!! Form::file('image', array('class' => 'image')) !!}
                    </div>
                </div>                
                
                <div class="form-group">
                    <label class="col-md-12">Categoria</label>
                    <div class="col-md-12">
                        <select name="categoria">
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Descrição</label>
                    <div class="col-md-12">
                        <textarea class="form-control" name="descricao" rows="5"></textarea>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn waves-effect waves-light btn-info">Salvar</button>
            {!! Form::close() !!}
        </div>

    </div>

</div>

@endsection





