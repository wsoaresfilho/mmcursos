{{ config('app.name', 'Laravel') }}


@extends('layouts.app')

@section('content')
{{ Session::get('message') }}
<h1>Categorias</h1>
 
    @foreach($categorias as $categoria)
        <h2><a href="/categorias/edit/{{ $categoria->id }}">{{ $categoria->nome }}</a></h2>
        <p>{{ $categoria -> descricao }}</p>
        <a href="/categorias/edit/{{ $categoria->id }}/edit">Editar</a>
        <form action="/categorias/{{ $categoria->id }}" method="POST">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" name="name" value="Apagar">
        </form>
        <hr>
    @endforeach
@endsection