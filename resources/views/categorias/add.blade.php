{{ config('app.name', 'Laravel') }}
@extends('layouts.app')
@section('content')
{{ Session::get('message') }}

 <div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Adicionar Categoria</h3>
            <br>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form  action="/categorias/store" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-12">Nome</label>
                    <div class="col-md-12">
                        <input type="text" name="nome" class="form-control" value="">
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
            </form>
        </div>

    </div>

</div>

@endsection





