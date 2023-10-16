@extends('adminlte::page')
@section('title')
Ajouter un patient | Laravel ZAK-APP
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card my-2 bg-light ">
                    <div class="card-header" style="background-color: #d0497a">
                        <div class="text-center">
                            <h3 class="text-white">Ajouter un nouveau patient</h3>
                        </div>
                    </div>
                    <div class="card-body bg-light">
                        <form method="POST" action="{{ route('patients.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="nom"class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>
                                <div class="col-md-6">
                                    <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" placeholder="Veuillez saisir le nom du client" required autofocus>
                                    @error('nom')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="prenom"class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>
                                <div class="col-md-6">
                                    <input id="prenom" type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" placeholder="Veuillez saisir le prenom du client" required autofocus>
                                    @error('prenom')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="cin"class="col-md-4 col-form-label text-md-end">{{ __('CIN') }}</label>
                                <div class="col-md-6">
                                    <input id="cin" type="text" class="form-control" name="cin" value="{{ old('cin') }}" placeholder="Veuillez saisir le cin du client" required autofocus>
                                    @error('cin')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="age"class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>
                                <div class="col-md-6">
                                    <input id="age" type="number" class="form-control" max="100" min="1" name="age" value="{{ old('age') }}" placeholder="Veuillez saisir l'age du client" required autofocus>
                                    @error('age')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telephone"class="col-md-4 col-form-label text-md-end">{{ __('Téléphonne') }}</label>
                                <div class="col-md-6">
                                    <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}" placeholder="Veuillez saisir le numéro de téléphonne du client" required autofocus>
                                    @error('telephone')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date_inscription"class="col-md-4 col-form-label text-md-end">{{ __('Date de visite') }}</label>
                                <div class="col-md-6">
                                    <input id="date_inscription" type="date" class="form-control" name="date_inscription" value="{{ old('date_inscription') }}" required autofocus>
                                    @error('date_inscription')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-pink w-100">
                                        {{ __('Ajouter') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
