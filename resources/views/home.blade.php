@extends('layout')

@section('title', 'Inicio')

@section('content-header')
<h1>
    Inicio
    {{-- <small>(filtrada)</small> --}}
</h1>
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-dashboard"></i> Inicio</li>
</ol>
@endsection

@section('content')
<h2 class="page-header">Bandeja de documentos</h2>
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3></h3>
                <p>Documentos jurídicos</p>
            </div>
            <div class="icon">
                <i class="ion ion-email"></i>
            </div>
            <a href="#" class="small-box-footer">Mostrar <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3></h3>
                <p>Documentos externos</p>
            </div>
            <div class="icon">
                <i class="ion ion-document-text"></i>
            </div>
            <a href="#" class="small-box-footer">Mostrar <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3></h3>
                <p>Procesos asignados</p>
            </div>
            <div class="icon">
                <i class="ion ion-document-text"></i>
            </div>
            <a href="#" class="small-box-footer">Mostrar <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
</div>

<h2 class="page-header">Bandeja de notificaciones</h2>
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3></h3>
                <p>Mensajes recibidos</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-send"></i>
            </div>
            <a href="#" class="small-box-footer">Mostrar <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-purple">
            <div class="inner">
                <h3></h3>
                <p>Mensajes enviados</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-send"></i>
            </div>
            <a href="#" class="small-box-footer">Mostrar <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
@endsection
