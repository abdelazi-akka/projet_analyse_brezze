@extends("adminlte::page")
@section("content")
<div class="container ">
    <div class="row">
        <div class="col-12">
            <div class="card my-2 bg-light">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="small-box bg-gradient-danger">
                                <div class="inner">
                                    <h3 class="text-white">{{ \App\Models\Client::count() }}</h3>
                                    <p>Nombre des patients</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users text-white"></i>
                                </div>
                                <a href="{{ route('patients.index') }}" class="small-box-footer">
                                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="small-box bg-gradient-orange">
                                <div class="inner">
                                    <h3 class="text-white">{{ \App\Models\Analyse::count() }}</h3>
                                    <p>Nombre des analyses</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-solid fa-vials text-white"></i>
                                </div>
                                <a href="{{ route('analyse.index') }}" class="small-box-footer">
                                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                                </a>
                        </div>
                    </div>
                    <div class="col-4">
                                <div class="small-box bg-gradient-success">
                                    <div class="inner">
                                        <h3 class="text-white">{{$NombreResultat}}</h3>
                                        <p>Nombre des résultats</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-solid fa-receipt text-white"></i>
                                    </div>
                                    <a href="{{ route('resultat.index') }}" class="small-box-footer">
                                        Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection