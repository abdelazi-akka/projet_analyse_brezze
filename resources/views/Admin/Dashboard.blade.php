 @extends("adminlte::page")
@section("content")
<div class="container">
    <div class="row">
        
        <div class="col-12">
            <div class="card my-2 bg-light">
                <div class="card-body">
                    <div class="row">
                        <!-- /***************************************************************** */ -->
                        <div class="col-4">
                            <div class="small-box bg-gradient-danger">
                                <div class="inner">
                                    <h3 class="text-white">{{ \App\Models\Employe::count() }}</h3>
                                    <p class="text-white">Nombre des employes</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users text-white"></i>
                                </div>
                                <a href="{{ route('employes.index') }}" class="small-box-footer">
                                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /***************************************************************** */ -->
                        <div class="col-4">
                            <div class="small-box bg-gradient-gray">
                                <div class="inner">
                                    <h3 class="text-white">{{ \App\Models\Analyse::count() }}</h3>
                                    <p class="text-white">Nombre des analyses</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-solid fa-vials text-white"></i>
                                </div>
                                <a href="{{ route('analyse.index') }}" class="small-box-footer">
                                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /***************************************************************** */ -->
                        <div class="col-4">
                            <div class="small-box bg-gradient-success">
                                <div class="inner">
                                    <h3 class="text-white">{{$NombreResultat}}</h3>
                                    <p>Nombre des résultats</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-solid fa-receipt text-white"></i>
                                </div>
                                <a href="{{ route('admin.AfficherResultat') }}" class="small-box-footer">
                                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /***************************************************************** */ -->
                    <div class="row">
                        <div class="col-4">
                            <div class="small-box bg-gradient-pink">
                                <div class="inner">
                                <h3 class="text-white">@forelse ($PayementJour as $item){{$item->sumPrix}} @empty 0 @endforelse</h3>
                                    <p class="text-white">Total pour le jour {{date("Y-m-d")}} en DH</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-solid fa-money-bill text-white"></i>
                                </div>
                                <a href="{{ route('admin.AfficherResultat') }}" class="small-box-footer">
                                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /***************************************************************** */ -->
                        <div class="col-4">
                            <div class="small-box bg-gradient-orange">
                                <div class="inner">
                                <h3 class="text-white">@forelse ($PayementMois as $item){{$item->totalPrix}} @empty 0 @endforelse</h3>
                                    <p class="text-white">Total pour le mois 
                                        @foreach ($PayementMois as $item )
                                            {{$item->month}}
                                        @endforeach    
                                    en DH</p>
                                </div>
                                <div class="icon">
                                <i class="fas fa-solid fa-money-bill text-white"></i>
                                </div>
                                <a href="{{ route('admin.AfficherResultat') }}" class="small-box-footer">
                                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /***************************************************************** */ -->
                        <div class="col-4">
                            <div class="small-box bg-gradient-info">
                                <div class="inner">
                                <h3 class="text-white">@forelse ($PayementAnne as $item){{$item->totalPrix}} @empty 0 @endforelse</h3>
                                    <p>Total pour l'année 
                                        @foreach ($PayementAnne as $item )
                                            {{$item->anne}}
                                        @endforeach    
                                    en DH</p>
                                </div>
                                <div class="icon">
                                <i class="fas fa-solid fa-money-bill text-white"></i>
                                </div>
                                <a href="{{ route('admin.AfficherResultat') }}" class="small-box-footer">
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