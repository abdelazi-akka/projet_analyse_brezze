@extends('adminlte::page')
@section('title')
    Modifier un résultat | Laravel ZAK-APP
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card my-2 bg-light ">
                    <div class="card-header" style="background-color:#d0497a">
                        <div class="text-center">
                            <h3 class="text-white">Modifier un résultat</h3>
                        </div>
                    </div>
                    <div class="card-body bg-light">
                        <form method="POST" action="{{ route('resultat.update',$data[0]->id_operation) }}">
                            @csrf
                            @method('PUT')
                            
                            <div class="row mb-3">
                                <label for="resultat"class="col-md-4 col-form-label text-md-end">{{ __("Résultat d'opération") }}</label>
                                <div class="col-md-6">
                                    <input id="resultat" type="text" class="form-control" name="resultat" value="{{ old('resultat',$data[0]->resultat) }}" placeholder="Veuillez saisir le résultat d'opération"  required autofocus>
                                    @error('resultat')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="op"class="col-md-4 col-form-label text-md-end">{{ __("Date d'opération") }}</label>
                                <div class="col-md-6">
                                    <input id="op" type="date" class="form-control" name="date_operation" value="{{ old('date_operation',$data[0]->date_operation) }}" required autofocus>
                                    @error('date_operation')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="resultat"class="col-md-4 col-form-label text-md-end">{{ __("Date de résultat") }}</label>
                                <div class="col-md-6">
                                    <input id="resultat" type="date" class="form-control" name="date_resultat" value="{{ old('date_resultat',$data[0]->date_resultat) }}" required autofocus>
                                    @error('date_resultat')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-4 mt-1 ">
                                    <button type="submit" class="btn btn-outline-pink w-100">
                                        {{ __('Modifier') }}
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
