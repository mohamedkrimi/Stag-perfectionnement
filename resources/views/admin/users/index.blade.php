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



        $(document).on('click', '.edit-country-btn', function() {
            var action = $(this).data('action');

            var countryId = $(this).data('country-id');
            // var countryName = $(this).data('country-name');
            // var countryIsoCode = $(this).data('country-iso-code');

            // $('#edit-country-modal form').attr('action', action);
            // $('#edit-country-modal input[name="name"]').val(countryName);
            // $('#edit-country-modal input[name="iso_code"]').val(countryIsoCode);
        });

                            $(document).on('click', '#activeUser', function() {
                                // console.log("sss");
                                var userId = $(this).data('user-id');
                                    $.ajax({
                                        url: '/dashboard/active',
                                        type: 'POST',
                                        data: {
                                        "_token": "{{ csrf_token() }}",
                                        "id": userId
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

                             });

                            $(document).on('click', '#BlockedUser', function() {
                                var userId = $(this).data('user-id');
                                    $.ajax({
                                        url: '/dashboard/blocked' ,
                                        type: 'POST',
                                        data: {
                                        "_token": "{{ csrf_token() }}",
                                        "id": userId
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

                            });






                        $('.closeDelete').click(function() {
                            $('#confirmationModal').modal('hide');
                        })
                        $('.delete-btn').click(function() {
                                var id = $(this).data('id');
                                $('#confirmationModal').modal('show');
                                $('#confirmDelete').click(function() {
                                $.ajax({
                                    url: '/dashboard/users-admin/' + id,
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
                            $('.closeDelete').click(function() {
                            $('#confirmationModal').modal('hide');
                        })
                        $('.closeEdit').click(function() {
                            $('#confirmationEditModal').modal('hide');
                        })
                        $('.delete-btn').click(function() {
                                var id = $(this).data('id');
                                $('#confirmationModal').modal('show');
                                $('#confirmDelete').click(function() {
                                $.ajax({
                                    url: '/dashboard/users/' + id,
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



    </script>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card mb-4 mt-2">

            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>Utilisateurs  </h3>
                    {{-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#addCountryModal">Add Country</button> --}}

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Prénom</th>
                                <th>Nom de famille</th>
                                <th>E-mail</th>


                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->firstname }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->email }}</td>






                                    <td>
                                        @if(!$user->is_admin)

                                            {{-- <button class="btn btn-sm btn-primary edit-btn" data-user-id="{{ $user->id }}" > <i class="uil-lock-open-alt"></i>
                                            </button> --}}
                                            <button type="button" class="btn btn-sm btn-danger delete-btn"
                                            data-id="{{$user->id}}">Supprimer</button>
                                        @endif
                                    </td>
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
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer ce utilisateur ?
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary closeDelete"  data-dismiss="modal"  aria-label="Close">Annuler</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Supprimer</button>
                </div>
            </div>
        </div>
    </div>



@endsection
