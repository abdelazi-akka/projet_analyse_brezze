@extends('adminlte::page')
@section('title')
    Ajouter un employe | ZAK-APP
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card my-2 bg-light ">
                    <div class="card-header" style="background:#d0497a">
                        <div class="text-center">
                            <h3 class="text-white" >Ajouter un nouveau employé</h3>
                        </div>
                    </div>
                    <div class="card-body bg-light">
                        <form method="POST" action="{{ route('employes.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="cin"class="col-md-4 col-form-label text-md-end">{{ __('CIN') }}</label>
                                <div class="col-md-6">
                                    <input id="cin" type="text" class="form-control" name="cin" value="{{ old('cin') }}" placeholder="Veuillez saisir le CIN" required autofocus>
                                    @error('cin')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="nom"class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>
                                <div class="col-md-6">
                                    <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" placeholder="Veuillez saisir le nom" required autofocus>
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
                                    <input id="prenom" type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" placeholder="Veuillez saisir le prénom" required autofocus>
                                    @error('prenom')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="adress"class="col-md-4 col-form-label text-md-end">{{ __('Adress') }}</label>
                                <div class="col-md-6">
                                    <input id="adress" type="text" class="form-control" name="adress" value="{{ old('adress') }}" placeholder="Veuillez saisir l'adress" required autofocus>
                                    @error('adress')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telephone"class="col-md-4 col-form-label text-md-end">{{ __('Télephonne') }}</label>
                                <div class="col-md-6">
                                    <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}" placeholder="Veuillez saisir le Télephonne" required autofocus>
                                    @error('telephone')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date"class="col-md-4 col-form-label text-md-end">{{ __('Date de Recrutement') }}</label>
                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control" name="date_recrutement" value="{{ old('date_recrutement') }}"  required autofocus>
                                    @error('date_recrutement')
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
