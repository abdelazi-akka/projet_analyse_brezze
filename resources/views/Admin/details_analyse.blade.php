@extends('adminlte::page')

@section('title')
    Show Analyse | Laravel GSM-App
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card my-2 bg-light">
                    <div class="card-header" style="background-color: #d0497a">
                        <div class="text-center">
                            <h3 class="text-white">Les détailles d'une analyse</h3>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-6 form-group mb-3">
                            <label >Abréviation</label>
                            <input  class="form-control" value="{{ $data->abrv }}"readonly>
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label >Prix</label>
                            <input  class="form-control" value="{{ $data->prix.' DH'}}"  readonly>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-6 form-group mb-3">
                            <label >Unité</label>
                            <input  class="form-control" value="{{ $data->unite }}"readonly>
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label >Normes</label>
                            <input  class="form-control" value="{{ $data->norme}}"  readonly>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-6 form-group mb-3">
                            <label>Désignation</label>
                            <input  class="form-control" value="{{ $data->designation }}" readonly>
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label>date d'ajout</label>
                            <input  class="form-control" value="{{ $data->created_at }}" readonly>
                        </div>
                    </div>
                    
                    <div class="row card-body">
                        <div class="col-md-6 form-group mb-3 offset-3">
                            <a class="btn btn-outline-pink w-100" href="{{route('analyse.index')}}">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
