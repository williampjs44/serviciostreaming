@extends('layouts.app')


@section('content')
<div class="col-md-10">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>Resultado de la búsqueda</h1></div>

                <div class="card-body">
                    
                        @if ( isset($datas) ) 
                        <div class="row">
                        <ul class="list-group">
                                @foreach($datas as $data)
                                
                                    <li class="list-group-item"><a href="{{ url('contenidos/usuario/').$data->id_user }}" > {{ $data->name }}</a></li>
                                
                                @endforeach
                        </ul>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

