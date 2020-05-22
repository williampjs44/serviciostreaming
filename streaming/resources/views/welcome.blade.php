@extends('layouts.app')

@section('content')
<div class="container">
    
    
<div class="row">
    <h2 class="text-white col-md-12"><i class="fas fa-video"></i> Videos en directo</h2>
    <video id="player" class="video-js vjs-default-skin col-md-12" width="350" height="500" controls preload="none">
        <source src="http://192.168.1.21:9000/1234.m3u8" type="application/x-mpegURL">
    </video>
    
</div>
<div class="row" >
    <h2 class="text-white col-md-12"><i class="fas fa-video"></i> Videojuegos destacados</h2>
    <div id="carouselExampleCaptions" class="carousel slide col-md-12" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
    <div class="carousel-item active">
    <a href="/categorias"><img src="/img/asmr.jpg" class="d-block w-100" alt="..."></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
    </div>
    </div>

    <div class="carousel-item">
    <a href="/categorias"><img src="/img/call.jpg" class="d-block w-100" alt="..."></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
    </div>

    <div class="carousel-item">
    <a href="/categorias"><img src="/img/darksoul.jpg" class="d-block w-100" alt="..."></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
    </div>
    </div>

    <div class="carousel-item">
    <a href="/categorias"><img src="/img/jedi.jpg" class="d-block w-100" alt="..."></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
    </div>
    </div>

    <div class="carousel-item">
    <a href="/categorias"><img src="/img/la taza.png" class="d-block w-100" alt="..."></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
    </div>
    </div>

        <div class="carousel-item">
    <a href="/categorias"><img src="/img/logoblackdesert.png" class="d-block w-100" alt="..."></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
    </div>
    </div>

    <div class="carousel-item">
    <a href="/categorias"><img src="/img/logocsgo1.png" class="d-block w-100" alt="..."></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
    </div>
    </div>

    <div class="carousel-item">
    <a href="/categorias"><img src="/img/logofifa1.jpg" class="d-block w-100" alt="..."></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
    </div>
    </div>

    <div class="carousel-item">
    <a href="/categorias"><img src="/img/logofornite.jpg" class="d-block w-100" alt="..."></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
    </div>
    </div>

    <div class="carousel-item">
    <a href="/categorias"><img src="/img/logohearthstone.png" class="d-block w-100" alt="..."></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
    </div>
    </div>

    <div class="carousel-item">
    <a href="/categorias"><img src="/img/logolol.jpg" class="d-block w-100" alt="..."></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
    </div>
    </div>

    <div class="carousel-item">
    <a href="/categorias"><img src="/img/maker2.jpg" class="d-block w-100" alt="..."></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
    </div>
    </div>

    <div class="carousel-item">
    <a href="/categorias"><img src="/img/overwatch-logo.png" class="d-block w-100" alt="..."></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
    </div>
    </div>

    <div class="carousel-item">
    <a href="/categorias"><img src="/img/pokemon.jpg" class="d-block w-100" alt="..."></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
    </div>
    </div>

    <div class="carousel-item">
    <a href="/categorias"><img src="/img/rainbow.jpg" class="d-block w-100" alt="..."></a>
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
    </div>
    </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
    </div>
</div>
</div>

@endsection
    
@section('extras')
    <script src="https://vjs.zencdn.net/7.6.6/video.js"></script>
    <link href="https://vjs.zencdn.net/7.6.6/video-js.css" rel="stylesheet" />
    <script>
        var player = videojs('#player')
    </script>
    
@endsection