 
@extends('adminlte::page')
@section('plugins.Datatables',true)
@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-2 bg-light "> 
                <div class="card-header" style="background-color: #d0497a">
                    <div class="text-center">
                        <h3 class="text-white">La liste des patients</h3>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>CIN</th>
                                <th>Nom & Prénom</th>
                                <th>Age</th>
                                <th>Téléphonne</th>
                                <th>Date de visite</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr class="text-center">
                                <td data-label="CIN">{{$item->cin}}</td>
                                <td data-label="Nom & Prénom">{{$item->nom}} {{$item->prenom}}</td>
                                <td data-label="Age">{{$item->age}}</td>
                                <td data-label="Téléphonne">{{$item->telephone}}</td>
                                <td data-label="Date de visite">{{$item->date_inscription}}</td>
                                <td data-label="Action" class="d-flex justify-content-center ">
                                <a href="{{route('analyses.edit',$item->id_client)}}" class="btn btn-sm btn-success">
                                        <i class="fas fa-solid fa-syringe"></i>
                                    </a>
                                    <a href="{{route('patients.show',$item->id_client)}}" class="btn btn-sm btn-primary mx-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route('patients.edit',$item->id_client)}}" class="btn btn-sm btn-warning mx-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="{{$item->id_client}}"  action="{{route('patients.destroy',$item->id_client)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                    <button type="submit" onclick="deleteForm({{$item->id_client}})" class="btn btn-sm btn-danger">
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
