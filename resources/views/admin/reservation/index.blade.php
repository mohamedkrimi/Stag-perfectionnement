@extends('admin.dashboard.app_dash')
@section('head')
    <!-- Datatables css -->
    <link href="{{ asset('admin_assets/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('script')
    <!-- Datatables js -->
    <script src="{{ asset('admin_assets/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>

    <script>
        $("#basic-datatable").DataTable({
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>"
                }
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
            },
        });



//         $(document).on('click', '.edit-cont-btn', function() {
//             var action = $(this).data('action');

//             var contId = $(this).data('cont-id');
//             var contName = $(this).data('cont-name');
//              var contIso_code = $(this).data('cont-iso_code');
// console.log("contIso_code");
// console.log(contIso_code)
//             $('#edit-cont-modal form').attr('action', action);
//             $('#edit-cont-modal input[name="name"]').val(contName);
//              $('#edit-cont-modal input[name="iso_code"]').val(contIso_code);
//         });




            // Handle delete form submission

            $(document).ready(function() {
                        $('.closeDelete').click(function() {
                            $('#confirmationModal').modal('hide');
                        })
                        $('.delete-btn').click(function() {
                                var id = $(this).data('id');
                                $('#confirmationModal').modal('show');
                                $('#confirmDelete').click(function() {
                                $.ajax({
                                    url: '/dashboard/contact/' + id,
                                    type: 'DELETE',
                                    data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": id
                                    },
                                    success: function(response) {
                                        // Traitez la réponse de la requête de suppression
                                        console.log(response);
                                        window.location.reload();
                                    },
                                    error: function(xhr, status, error) {
                                        // Gérez les erreurs de la requête de suppression
                                        console.log(xhr.responseText);
                                    }
                                });
                                $('#confirmationModal').modal('hide');
                            });
                            });
                    });






    </script>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card mb-4 mt-2">

            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>Contacts</h3>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Image</th>
                                <th>Produit</th>
                                <th>Nom</th>

                                <th>Prenom</th>

                                <th>Email</th>
                                <th>Date</th>
                                <th>User</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($reservations as $index=>$cont)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td><img src="{{ Storage::url($cont->produit->image) }}"  alt="" class="avatar-xs">
                                    </td>
                                    <td>{{ $cont->produit->name }}</td>
                                    <td>{{ $cont->nom }}</td>
                                    <td>{{ $cont->prenom }}</td>
                                    <td>{{ $cont->email }}</td>
                                    <td>{{ $cont->created_at }}</td>
                                    <td>{{ $cont->user->firstname }} {{ $cont->user->lastname }}</td>
                                    {{-- <td>

                                            <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                data-id="{{$cont->id}}">Supprimer </button>

                                    </td> --}}

                                </tr>


                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- delete Status Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation de suppression</h5>
                    <button type="button" class="btn-close closeDelete" data-dismiss="modal"  aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer ce Contact ?
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary closeDelete"  data-dismiss="modal"  aria-label="Close">Annuler</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Supprimer</button>
                </div>
            </div>
        </div>
    </div>


@endsection
