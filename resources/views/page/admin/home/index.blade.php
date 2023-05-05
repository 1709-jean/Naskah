@extends('layout/sbadmin')

@section('title','Dashboard Admin')

@section('content')
<div class="container-fluid mt-3">
    <div class="card-content">
        <div class="alert alert-primary alert-dismissible fade show">
            <strong> Halo!</strong> Selamat Datang, anda login sebagai Admin.
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="card card-widget">
                <div class="card-body bg-warning">
                    <div class="media">
                        <span class="card-widget__icon"><i class="fa fa-info"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title">{{$lost}}</h2>
                            <h5 class="card-widget__subtitle">Berita Lost</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-widget">
                <div class="card-body bg-danger">
                    <div class="media">
                        <span class="card-widget__icon"><i class="fa fa-info"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title">{{$found}}</h2>
                            <h5 class="card-widget__subtitle">Berita Found</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card card-widget">
                <div class="card-body gradient-4">
                    <div class="media">
                        <span class="card-widget__icon"><i class="fa fa-users"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title">{{$user}}</h2>
                            <h5 class="card-widget__subtitle">User</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection