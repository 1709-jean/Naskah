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
        <div class="col-md-3">
            <div class="card card-widget">
                <div class="card-body bg-danger">
                    <div class="media">
                        <span class="card-widget__icon" style="color:white;"><i class="fa fa-info"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title" style="color:white;">{{$lost}}</h2>
                            <h5 class="card-widget__subtitle" style="color:white;">Berita Lost</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-widget">
                <div class="card-body bg-secondary">
                    <div class="media">
                        <span class="card-widget__icon" style="color:white;"><i class="fa fa-hourglass-start"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title" style="color:white;">{{$lostop}}</h2>
                            <h5 class="card-widget__subtitle" style="color:white;">Lost - On Process</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-widget">
                <div class="card-body bg-success">
                    <div class="media">
                        <span class="card-widget__icon" style="color:white;"><i class="fa fa-thumbs-up"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title" style="color:white;">{{$lostdone}}</h2>
                            <h5 class="card-widget__subtitle" style="color:white;">Lost - Done</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card card-widget">
                <div class="card-body bg-primary">
                    <div class="media">
                        <span class="card-widget__icon" style="color:white;"><i class="fa fa-info"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title" style="color:white;">{{$found}}</h2>
                            <h5 class="card-widget__subtitle" style="color:white;">Berita Found</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-widget">
                <div class="card-body bg-secondary">
                    <div class="media">
                        <span class="card-widget__icon" style="color:white;"><i class="fa fa-hourglass-start"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title" style="color:white;">{{$foundop}}</h2>
                            <h5 class="card-widget__subtitle" style="color:white;">Found - On Process</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-widget">
                <div class="card-body bg-success">
                    <div class="media">
                        <span class="card-widget__icon" style="color:white;"><i class="fa fa-thumbs-up"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title" style="color:white;">{{$founddone}}</h2>
                            <h5 class=" card-widget__subtitle" style="color:white;">Found(Done)</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card card-widget">
                <div class="card-body gradient-4">
                    <div class="media">
                        <span class="card-widget__icon"><i class="fa fa-users"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title" style="color:black;">{{$user}}</h2>
                            <h5 class="card-widget__subtitle" style="color:black;">User</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection