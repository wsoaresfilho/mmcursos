@extends('layouts.app')

@section('content')

<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Home</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Home</li>
    </ol>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Seja bem vindo
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
