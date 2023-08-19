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

 

        $(document).on('click', '.edit-status-btn', function() {
            var action = $(this).data('action');

            var statusId = $(this).data('status-id');
            var statusName = $(this).data('status-nom');
            var statusName_en = $(this).data('status-nom_en');
             var statusStatus = $(this).data('status-status');

            $('#edit-status-modal form').attr('action', action);
            $('#edit-status-modal input[name="nom"]').val(statusName);
            $('#edit-status-modal input[name="nom_en"]').val(statusName_en);
             $('#edit-status-modal input[name="status"]').val(statusStatus);
        });



       
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
                                    url: '/dashboard/status/' + id,
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
                    <h3>Status</h3>
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                        data-bs-target="#addStatusModal">Ajouter Status</button>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Nom status en farncais</th>
                                <th>Nom status en englais</th>
                                <th>Priorité</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($status as $index=>$stat)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{ $stat->nom }}</td>
                                    <td>{{ $stat->nom_en }}</td>
                                    <td>{{ $stat->status }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary edit-status-btn" data-bs-toggle="modal"
                                            data-bs-target="#edit-status-modal" data-action="{{ route('status.update',  $stat->id) }}" data-status-id="{{ $stat->id }}"
                                            data-status-nom="{{ $stat->nom }}"  data-status-nom_en="{{ $stat->nom_en }}" data-status-status="{{ $stat->status }}" 
                                            >
                                            Modifier
                                        </button>
                                            <button type="button" class="btn btn-sm btn-danger delete-btn" 
                                                data-id="{{$stat->id}}">Supprimer </button>

                                    </td>
                                </tr>

{{-- 
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this Status?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                    <button type="button" data-id="{{$stat->id}}" class="btn btn-danger delete-btn">Delete {{$stat->id}}</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Country Modal -->
    <div class="modal fade" id="addStatusModal" tabindex="-1" aria-labelledby="addStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStatusModalLabel">Ajouter Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('status.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom status en francais</label>
                            <input type="text" class="form-control" id="nom" name="nom" required placeholder="Nom status Fr">
                        </div>
                        <div class="mb-3">
                            <label for="nom_en" class="form-label">Nom status en englais</label>
                            <input type="text" class="form-control" id="nom_en" name="nom_en" required placeholder="Nom status En">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Priorité</label>
                            <input type="number" step="1" class="form-control" id="edit-status-status" name="status" placeholder="1"
                            required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
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
                    Êtes-vous sûr de vouloir supprimer ce status ?
                </div>
                <div class="modal-footer">
                   
                    <button type="button" class="btn btn-secondary closeDelete"  data-dismiss="modal"  aria-label="Close">Annuler</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for edit -->

    <div class="modal fade" id="edit-status-modal" tabindex="-1" role="dialog" aria-labelledby="edit-status-modal-title"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form  method="POST" id="edit-status-modal">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-status-modal-title">Modifier status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-status-nom">Nom status en farncais</label>
                            <input type="text" class="form-control" id="edit-status-nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-status-nom_en">Nom status en englais</label>
                            <input type="text" class="form-control" id="edit-status-nom_en" name="nom_en" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-status-status">Priorité</label>
                            <input type="number" step="1" class="form-control" id="edit-status-status" name="status"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
