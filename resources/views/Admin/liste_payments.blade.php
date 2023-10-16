@extends('adminlte::page')
@section('plugins.Datatables',true)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-2 bg-light "> 
                <div class="card-header" style="background-color:#d0497a;">
                    <div class="text-center">
                        <h3 class="text-white">La Listes des paiements</h3>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ID Opération</th>
                                <th>Nom & Prénom</th>
                                <th>CIN</th>
                                <th>Désignation</th>
                                <th>Prix</th>
                                <th>Date d'opération</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr class="text-center">
                                <td data-label="ID Opération">{{$item->id_operation}}</td>
                                <td data-label="Nom & Prénom">{{$item->nom}} & {{$item->prenom}}</td>
                                <td data-label="CIN">{{$item->cin}}</td>
                                <td data-label="Désignation">{{$item->designation}}</td>
                                <td data-label="Prix">{{$item->prix}} DH</td>
                                <td data-label="Date d'opération">{{$item->date_operation}}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                        
                        
                    </table>
                </div>
            </div>
            
            
        </div>
    </div>
</div>
<!--***********************************************************************************************************************************************************-->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-2 bg-light "> 
                <div class="card-header" style="background-color:#d0497a;">
                    <div class="text-center">
                        <h3 class="text-white">La Listes des paiements(jours)</h3>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                <table id="mytable" class="table table-bordered table-striped ">
                    <thead>
                        <tr class="text-center">
                            <th>Date du Jour</th>
                            <th>Total des opérations</th>
                            <th>Total Prix du jour</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data2 as $item2)
                        <tr class="text-center">
                            <td data-label="Date du Jour">{{$item2->date_operation}}</td>
                            <td data-label="Total des opérations">{{$item2->totalOperation}}</td>
                            <td data-label="Total Prix du jours">{{number_format($item2->sumPrix,2)}} DH</td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!--***********************************************************************************************************************************************************-->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-2 bg-light "> 
                <div class="card-header" style="background-color:#d0497a;">
                    <div class="text-center">
                        <h3 class="text-white">La Listes des paiements(mois)</h3>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Année</th>
                                <th>Mois</th>
                                <th>Total des opérations</th>
                                <th>Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data3 as $item)
                            <tr class="text-center">
                                <td data-label="Année">{{$item->anne}}</td>
                                <td data-label="Mois">{{$item->month}}</td>
                                <td data-label="Total des opérations">{{$item->totalOperation}}</td>
                                <td data-label="Prix">{{number_format($item->totalPrix,2)}} DH</td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
        </div>
    </div>
</div>
</div>
<!--***********************************************************************************************************************************************************-->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-2 bg-light "> 
                <div class="card-header" style="background-color:#d0497a;">
                    <div class="text-center">
                        <h3 class="text-white">La Listes des paiements(année)</h3>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Année</th>
                                <th>Total des opérations</th>
                                <th>Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data4 as $item)
                            <tr class="text-center">
                                <td data-label="Année">{{$item->anne}}</td>
                                <td data-label="Total des opérations">{{$item->totalOperation}}</td>
                                <td data-label="Prix">{{number_format($item->totalPrix,2)}} DH</td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $('.table').DataTable({
            dom:'Bfrtip',
            buttons:['copy','excel','csv','pdf','print','colvis'],
            "pageLength": 3,
            "language": {
                "sEmptyTable":    "",
                "sInfo":          "Affichage de _START_ à _END_ sur _TOTAL_ entrées ",
                "sSearch":        "Chercher:",
        "oPaginate": {
            
            "sNext":    "Suivant",
            "sPrevious": "Précedent"
        },
        
    }
        })
    })
    </script>
@endsection

