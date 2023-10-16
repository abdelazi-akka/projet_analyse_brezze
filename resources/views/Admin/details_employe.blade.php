@extends('adminlte::page')
@section('title')
    Afficher Employe | Laravel ZAK-APP
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card my-2 bg-light">
                    <div class="card-header" style="background-color:#d0497a;">
                        <div class="text-center">
                            <h3 class="text-white">les détails d'un employé</h3>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-6 form-group mb-3">
                            <label >Prénom</label>
                            <input  class="form-control" value="{{ $data->prenom }}"readonly>
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label >Nom</label>
                            <input  class="form-control" value="{{ $data->nom }}"  readonly>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-6 form-group mb-3">
                            <label>Date de recrutement</label>
                            <input  class="form-control" value="{{ $data->date_recrutement }}" readonly>
                        </div>

                        <div class=" col-6 form-group mb-3">
                            <label >Adress</label>
                            <input  class="form-control" value="{{$data->adress}}" readonly>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-6 form-group mb-3">
                            <label >CIN</label>
                            <input  class="form-control" value="{{ $data->cin }}" readonly>
                        </div>
                        <div class=" col-6 form-group mb-3">
                            <label>Telephone</label>
                            <input  class="form-control" value="{{ $data->telephone }}"readonly>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-12 form-group mb-3 text-center">
                            <a class="btn btn-outline-pink w-50" href="{{route('employes.index')}}">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
