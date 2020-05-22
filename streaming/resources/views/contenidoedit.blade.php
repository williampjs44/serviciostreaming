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
            <div class="card">
                <div class="card-header">Contenido</div>

                <div class="card-body">
                    
                        @if ( isset($data) ) 
                        <form method="POST" action="{{  route('contenidos.update',$data->id_contenido)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}"/>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="titulo">Titulo</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $data->titulo) }}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="descripcion">Descripcion</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion', $data->descripcion) }}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="URL">URL</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="URL" name="URL" value="{{ old('URL', $data->URL) }}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="archivo">archivo</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" id="archivo" name="archivo" value="{{ old('archivo', $data->archivo) }}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="tipo">tipo</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="tipo" name="tipo" >
                                    <option value=""></option>
                                    <option {{ ( old('tipo', $data->tipo) == 'enlace' ) ? "selected" : ""}} value="enlace">enlace</option>
                                    <option {{ ( old('tipo', $data->tipo) == 'video' ) ? "selected" : ""}} value="video">video</option>
                                </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        @endif
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection