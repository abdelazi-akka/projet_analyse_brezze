@extends('adminlte::page')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card my-3 mx-3 bg-light ">
                    <div class="card-header" style="background-color: #d0497a;">
                        <div class="text-center">
                            <h3 class="text-white">Modifier une analyse</h3>
                        </div>
                    </div>
                    <div class="card-body bg-light">
                        <form method="POST" action="{{ route('analyse.update',$data->id_analyse) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="abréviation"class="col-md-4 col-form-label text-md-end">{{ __('Abréviation') }}</label>
                                <div class="col-md-6">
                                    <input id="abréviation" type="text" class="form-control" name="abrv" value="{{ old('abréviation',$data->abrv) }}" placeholder="Veuillez saisir l'abréviation d'analyse" required autofocus>
                                    @error('abrv')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="designation"class="col-md-4 col-form-label text-md-end">{{ __('Désignation') }}</label>
                                <div class="col-md-6">
                                    <input id="designation" type="text" class="form-control" name="designation" value="{{ old('designation',$data->designation) }}" placeholder="Veuillez saisir le désignation d'analyse" required autofocus>
                                    @error('designation')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="prix"class="col-md-4 col-form-label text-md-end">{{ __('Prix') }}</label>
                                <div class="col-md-6">
                                    <input id="prix" type="text" class="form-control" name="prix" value="{{ old('prix',$data->prix) }}" placeholder="Veuillez saisir le prix d'analyse" required autofocus>
                                    @error('prix')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="norme"class="col-md-4 col-form-label text-md-end">La norme d'analyse</label>
                                <div class="col-md-6">
                                    <input id="norme" type="text" class="form-control" name="norme" value="{{ old('norme',$data->norme) }}" placeholder="Veuillez saisir la norme d'analyse" required autofocus>
                                    @error('norme')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="unite"class="col-md-4 col-form-label text-md-end">L'unité de mesure'</label>
                                <div class="col-md-6">
                                    <input id="unite" type="text" class="form-control" name="unite" value="{{ old('unite',$data->unite) }}" placeholder="Veuillez saisir L'unité de mesure d'analyse" required autofocus>
                                    @error('unite')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
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
