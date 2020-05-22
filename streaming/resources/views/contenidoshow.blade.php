@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contenido</div>

                <div class="card-body">
                    
                        @if ( isset($contenido) ) 
                            <h1>{{ $contenido->titulo }}</h1>
                            <p>{{ $contenido->descripcion }}</p>
                            @if ($contenido->tipo == "video")
                                        @if(isset($contenido->URL))
                                        <iframe src="{{ $contenido->URL }}" frameborder="0" width="350" height="200"></iframe>
                                        @else
                                            <video class="video-js vjs-default-skin" width="350" height="200" controls preload="none">
                                                <source src="/storage/uploads/{{ $contenido->archivo }}" type="application/x-mpegURL">
                                            </video>
                                        @endif
                                    @else   
                                        @if(isset($contenido->URL))
                                        <img src="{{ $contenido->URL }}" class="card-img-top" alt="{{ $contenido->titulo }}" width="350" height="200"/>
                                        @else
                                        <img src="/storage/uploads/{{ $contenido->archivo }}" class="card-img-top" alt="{{ $contenido->titulo }}" width="350" height="200"/>
                                        @endif
                                    @endif
                        @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h2 class="text-white">Comentarios</h2>
            @if (isset($comentarios))
                <ul class="list-group mb-3">    
                    @foreach($comentarios as $comentario)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <p><b> {{ $comentario->name }}</b><br>
                            {{ $comentario->comentarios }}</p>
                        </li>    
                    @endforeach
                </ul>
            @endif
            <h2 class="text-white">Nuevo comentario</h2>
            <form class="card p-2" method="POST" action="{{  url('comentarios')}}">
                @csrf
                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}"/>
                <input type="hidden" name="id_contenido" value="{{ $contenido->id_contenido }}"/>
                <div class="input-group">
                    <input type="text" class="form-control" id="comentarios" name="comentarios"/>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection