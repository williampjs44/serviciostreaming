@extends('layouts.app')

@section('messages')
    @if(Session::has('flash_message'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        {{ Session::get('flash_message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-transparent">
                <div class="card-header"><h1 class="text-white">Mi perfil</h1></div>

                <div class="card-body">
                    
                        <h2 class="text-white">Mis contenidos</h2>
                        @if ( isset($datas) ) 
                        <div class="row">
                                @foreach($datas as $data)
                                <div class="col-md-3 mb-5 lcontenidos">
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
                                        <a class="btn btn-primary" href="{{ route('contenidos.edit',$data->id_contenido) }}">Editar</a>
                                        <button class="btn btn-danger delete-link" id="{{ $data->id_contenido }}" data-link="{{ route('contenidos.destroy',$data->id_contenido) }}" title="Eliminar" data-toggle="modal" data-target="#delFormModal">Eliminar</button>
                                    </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                        @endif
                       

                    <!-- <div class="row">
                        <div class="container">
                        <div class="row justify-content-center">
                        <div class="col-md-8 border border-dark p-4">
                        <h2 class="col-md-12">Nuevo Contenido</h2>
                        <form method="POST" action="{{ url('contenidos') }}" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}"/>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="titulo">Titulo</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="titulo" name="titulo"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="descripcion">Descripcion</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="descripcion" name="descripcion"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="URL">URL</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="URL" name="URL"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="archivo">archivo</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" id="archivo" name="archivo"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="tipo">tipo</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="tipo" name="tipo"> 
                                    <option value=""></option>
                                    <option value="enlace">enlace</option>
                                    <option value="video">video</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                        </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="col-md-4">
    <h2 class="text-white">Nuevo Contenido</h2>
    <form method="POST" action="{{ url('contenidos') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}"/>
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right text-white" for="titulo">Titulo</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="titulo" name="titulo"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right text-white" for="descripcion">Descripcion</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="descripcion" name="descripcion"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right text-white" for="URL">URL</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="URL" name="URL"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right text-white" for="archivo">archivo</label>
            <div class="col-md-8">
                <input type="file" class="form-control-file" id="archivo" name="archivo"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right text-white" for="tipo">tipo</label>
            <div class="col-md-8">
                <select class="form-control" id="tipo" name="tipo"> 
                <option value=""></option>
                <option value="enlace">enlace</option>
                <option value="video">video</option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-12 text-right">
            <button type="submit" class="btn btn-primary ">Submit</button>
        </div>
    </form>
</div>

    </div>
</div>

@endsection

@section('extras')
<form action="" name="delForm" id="delForm" method="POST">
    @csrf
    @method('DELETE')
    <div class="modal" tabindex="-1" role="dialog" id="delFormModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title negro">Eliminar contenido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="negro">¿Seguro que quieres eliminar este contenido?</p>
          <p id="recordatorio"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary">Sí</button>
        </div>
      </div>
    </div>
  </div>
</form>
<script type="text/javascript">
    $(function(){
        $(".delete-link").on("click", function(){
            $('#delForm').attr('action', $(this).attr('data-link'));
            var txt = $(this).siblings('h5').text();
            $('#recordatorio').text(txt);
        });
    });
</script>
@endsection
