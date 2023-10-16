@extends('adminlte::page')
@section('plugins.Datatables',true)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-2 bg-light "> 
                <div class="card-header" style="background-color: #d0497a">
                    <div class="text-center">
                        <h3 class="text-white">La Listes des résultats</h3>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>CIN</th>
                                <th>Nom & Prénom</th>
                                <th>Désignation</th>
                                <th>Date d'opération</th>
                                <th>Résultat</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr class="text-center">
                                <td data-label="CIN">{{$item->cin}}</td>
                                <td data-label="Nom & Prénom">{{$item->nom}} {{$item->prenom}}</td>
                                <td data-label="Désignation">{{$item->designation}}</td>
                                <td data-label="Date de visite">{{$item->date_operation}}</td>
                                <td data-label="Résultat" class="{{$item->etat===0?'bg-warning':'bg-success'}}">{{$item->resultat ==null ?'pas encore':$item->resultat}}</td>
                                <td data-label="Action" class="d-flex justify-content-center align-items-center">
                                    <a href="{{$item->etat===1? route('resultat.show',$item->id_client):null}}"  class="btn btn-sm btn-primary mx-2">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route('resultat.edit',$item->id_operation)}}" class="btn btn-sm btn-warning mx-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="{{$item->id_operation}}"  action="{{route('resultat.destroy',$item->id_operation)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                    <button type="submit" onclick="deleteForm({{$item->id_operation}})" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        $('#mytable').DataTable({
            dom:'Bfrtip',
            buttons:['copy','excel','csv','pdf','print','colvis'],
            "pageLength": 4,

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
    function deleteForm(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {confirmButton: 'btn btn-success m-2',cancelButton: 'btn btn-danger m-2'},buttonsStyling: false})
                swalWithBootstrapButtons.fire({
                title: 'Es-tu sûr?',
                text: "Vous ne pourrez pas revenir en arrière !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'OUI, supprimer !',
                cancelButtonText: 'NON, Annuler!',
                reverseButtons: true
                }).then((result) => {
                    $
                if (result.isConfirmed) {
                    document.getElementById(id).submit()
                } else if (

                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Annulé.',
                    'Votre fichier imaginaire est en sécurité. :)',
                    'error'
                    )
                }
        })
    }
</script>
@if (session()->has('success'))
<script>
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: "{{session()->get('success')}}",
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif
    
@endsection
