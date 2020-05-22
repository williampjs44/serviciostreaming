@extends('layouts.app')


@section('content')
<div class="col-md-10">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>Los contendios de {{ $user->name }}</h1></div>

                <div class="card-body">
                    
                        @if ( isset($datas) ) 
                        <div class="row">
                                @foreach($datas as $data)
                                <div class="col-md-3 mb-5">
                                <div class="card">
                                    @if ($data->tipo == "video")
                                        @if(isset($data->URL))
                                        <iframe src="{{ $data->URL }}" frameborder="0" width="350" height="200"></iframe>
                                        @else
                                            <video class="video-js vjs-default-skin" width="350" height="200" controls preload="none">
                                                <source src="/storage/uploads/{{ $data->archivo }}" type="application/x-mpegURL">
                                            </video>
                                        @endif
                                    @else   
                                        @if(isset($data->URL))
                                        <img src="{{ $data->URL }}" class="card-img-top" alt="{{ $data->titulo }}" width="350" height="200"/>
                                        @else
                                        <img src="/storage/uploads/{{ $data->archivo }}" class="card-img-top" alt="{{ $data->titulo }}" width="350" height="200"/>
                                        @endif
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $data->titulo }}</h5>
                                        <p class="card-text"> {{ $data->descripcion }}</p>
                                        <a class="btn btn-primary" href="{{ route('contenidos.show',$data->id_contenido) }}">Ver</a>
                                    </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

