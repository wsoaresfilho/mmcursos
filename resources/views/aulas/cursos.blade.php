@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">User Card </h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">User Card</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row el-element-overlay m-b-40">
            @foreach($cursos as $curso)
                <!-- /.usercard -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"> <img src="../plugins/images/users/java.png" width="400" height="400" />
                                <div class="el-overlay">
                                    <ul class="el-info">
                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="../plugins/images/users/java.png"><i class="icon-magnifier"></i></a></li>
                                        <li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="el-card-content">
                                <h3 class="box-title">{{ $curso->nome }}</h3> <small>Básico</small>
                                <br/> </div>
                        </div>
                    </div>
                </div>
                <!-- /.usercard-->
            @endforeach
        </div>
    </div>
@endsection