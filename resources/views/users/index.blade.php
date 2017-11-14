{{ config('app.name', 'Laravel') }}
@extends('layouts.app')
@section('content')

@if ( Session::get('message'))
    <div class="alert alert-success"> {{ Session::get('message') }} </div>
@endif


<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">Users</div>
            <div class="table-responsive">
                <table class="table table-hover manage-u-table">
                    <thead>
                        <tr>
                            <th width="70" class="text-center">#</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th width="300">DELETAR</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><a href="/users/edit/{{ $user->id }}">{{ $user->email }}</a></td>
                            <td>{{ $user->type }}</td>
                            <td><a href="/users/delete/{{ $user->id }}">Remover</a></td>
                            <hr>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<a href="/users/add">Adicionar</a>
@endsection