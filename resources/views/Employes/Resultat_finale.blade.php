@extends('adminlte::page')
@section('title')
    La liste des résultats | Laravel ZAK-APP
@endsection
@section('content')
<style>
    .table{
        border-collapse: collapse;
    }
    
    
    .table th{
        background-color:#d0497a;
        color:#ffffff;
    }
    
    
    
    /*responsive*/
    @media(max-width: 1100px){
        *{
            font-size: 14px;
        }
    }
    @media(max-width: 800px){
        .table thead{
            display: none;
        }
        .dt-buttons,#mytable_filter,.dataTables_info,.pagination{
            font-size: 10px;
    
        }
    
        .table, .table tbody, .table tr, .table td{
            display: block;
            /* width: 88%; */
        }
        .table tr{
            margin-bottom:20px;
        }
        .table td{
            text-align: right;
            padding-left: 50%;
            text-align: right;
            position: relative;
        }
        .table td::before{
            content: attr(data-label);
            position: absolute;
            left:0;
            width: 50%;
            padding-left:15px;
            font-size:15px;
            font-weight: bold;
            text-align: left;
        }
        #row2{
            display: block;
        }
        #row2 h5{
            text-align: left !important;
        }
    }
    
    
     #card1{
        background-color:rgb(220,220,220);    
    }
  @media print{
    #row1{
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }
  }
  #row1,#row2{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

</style>
    <div class="container" id="mytable">
        <div class="row">
            <div class="col-12">
                <div class="card my-2" id="card1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 mx-auto ">
                                <img src="{{ asset('asset/logo-laboc-removebg-preview.png')}}" class="img img-fluid" alt="...">
                            </div>
                        </div>
                        <div class="row mt-5" id="row1">
                            <div class="col-sm-5">
                                <div class="" id="card1"> 
                                    <h5 class="card-text" style="color:blue;font-weight: bold">Dr.Abdelfattah BENOMAR</h5>
                                    <h5 class="card-text" style="color:rgba(224, 82, 125, 0.725);font-weight: bold">Médcin Biologiste</h5>
                                    <h5 class="card-text ">Lauréat de la Faculté de Médecine et de la Pharmacie de Rabat</h5>
                                </div>
                            </div>
                            <div class="col-sm-5" id="arabic">
                                <div class="" id="card1"> 
                                    <h5 class="card-text text-right" style="color:blue;font-weight: bold;">الدكتور عبد الفتاح بن عمر</h5>
                                    <h5 class="card-text text-right" style="color:rgba(224, 82, 125, 0.725);font-weight: bold">طبيب احيائي</h5>
                                    <h5 class="card-text text-right"> خريج كلية الطب والصيدلة بالرباط</h5>
                                </div>
                            </div>
                        </div>
                        <!--**************************************************************************************************-->
                        <div class="row mt-5" id="row2">
                            <div class="col-md-5">
                                <div class=""> 
                                    <h5 class="card-text"><span style="color:rgb(0, 0, 0);font-weight: bold;">Prélévement du :</span>{{$data[0]->date_operation}}</h5>
                                    <h5 class="card-text"><span style="color:rgb(0, 0, 0);font-weight: bold;">N² patente:</span>J12D5D44F811</h5>
                                    <h5 class="card-text"><span style="color:rgb(0, 0, 0);font-weight: bold;">Edution du :</span> {{$data[0]->date_resultat}}</h5>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="text-center"> 
                                    <h5 class="card-text "><span style="color:rgb(0, 0, 0);font-weight: bold;">Nom & Prénom :</span>{{$data[0]->nom}} {{$data[0]->prenom}}</h5>
                                    <h5 class="card-text "><span style="color:rgb(0, 0, 0);font-weight: bold;">CIN :</span>{{$data[0]->cin}}</h5>
                                </div>
                            </div>
                            
                        </div>
                        <!--**************************************************************************************************-->
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="mx-auto"> 
                                    <h5 class="card-text text-center" style="font-weight: bold;">BIOCHIMIE</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--**************************************************************************************************-->
                    
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <table id="mytable" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>Désignation</th>
                                        <th>Résultat</th>
                                        <th>Uniteé</th>
                                        <th>Normes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $item)
                                    <tr class="text-center">
                                        <td data-label="Désignation">{{$item->designation}}</td>
                                        <td data-label="Résultat">{{$item->resultat}}</td>
                                        <td data-label="Uniteé">{{$item->unite}}</td>
                                        <td data-label="Normes">{{$item->norme}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                    <!--**************************************************************************************************-->
                    <div class="my-4">
                        <a href="#" class="btn btn-sm btn-primary m-1" id="print" onclick="
                        document.getElementById('print').style.display='none'
                        setTimeout(function(){
                            document.getElementById('print').style.display='inline-block'

                        },200)
                            window.print()
                            ">
                            <i class="fas fa-print" ></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

