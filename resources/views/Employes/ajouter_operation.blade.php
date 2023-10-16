@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card my-2  bg-light ">
                    <div class="card-header" style="background-color: #d0497a">
                        <div class="text-center">
                            <h3 class="text-white">Ajouter une opération</h3>
                        </div>
                    </div>
                    <div class="card-body bg-light">
                        <form method="POST" action="{{ route('analyses.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="analyse"class="col-md-4 col-form-label text-md-end">{{ __("La désignation du l'analyse") }}</label>
                                <div class="col-md-6">
                                    <select name="id_analyse" id="analyse" class="form-control">
                                        @foreach ($analyses as $item )
                                                <option value="{{$item->id_analyse}}">Designation:{{$item->designation}} | prix:{{$item->prix}} DH</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="client"class="col-md-4 col-form-label text-md-end">{{ __("Client") }}</label>
                                <div class="col-md-6">
                                    <select name="id_client" id="client" class="form-control">
                                        <option value="{{$data->id_client}}">Nom :{{$data->nom}} | Prénom :{{$data->prenom}} | cin :{{$data->cin}}</option>
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="row mb-3">
                                <label for="resultat"class="col-md-4 col-form-label text-md-end">{{ __("Résultat d'opération") }}</label>
                                <div class="col-md-6">
                                    <input id="resultat" type="text" class="form-control" name="resultat" value="{{$data->prix}} DH"  readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="resultat"class="col-md-4 col-form-label text-md-end">{{ __("Résultat d'opération") }}</label>
                                <div class="col-md-6">
                                    <input id="resultat" type="text" class="form-control" name="resultat" value="{{ old('resultat') }}"  autofocus>
                                </div>
                            </div> --}}
                            <div class="row mb-3">
                                <label for="date_operation"class="col-md-4 col-form-label text-md-end">{{ __("Date d'opération") }}</label>
                                <div class="col-md-6">
                                    <input id="date_operation" type="date" class="form-control" name="date_operation" value="{{ old('date_operation') }}" required autofocus>
                                    @error('date_operation')
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
