{{ config('app.name', 'Laravel') }}


@extends('layouts.app')

@section('content')
{{ Session::get('message') }}
<h1>Categorias</h1>
 
<h1>Editar categoria</h1>
<form action="/categorias/{{ $detailpage->id }}" method="POST">
    <input type="text" name="nome" value="{{ $detailpage->nome }}" placeholder="Nome">
    {{ ($errors->has('nome')) ? $errors->first('nome') : '' }}<br>
    <textarea name="descricao" rows="8" cols="40" placeholder="Descricao">{{ $detailpage->descricao }}</textarea>
    {{ ($errors->has('descricao')) ? $errors->first('descricao') : '' }}<br>
    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="name" value="Salvar">
</form>

@endsection