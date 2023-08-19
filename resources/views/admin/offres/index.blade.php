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

 

        $(document).on('click', '.edit-offre-btn', function() {
            var action = $(this).data('action');
            var offreId = $(this).data('offres-id');
            var offreName = $(this).data('offres-nom');
            var offreDescription= $(this).data('offres-description');
            var offrePrix = $(this).data('offres-prix');
            var offreTva = $(this).data('offres-tva');
            var offreEstimationTime = $(this).data('offres-estimationtime');

            $('#edit-offres-modal form').attr('action', action);
            $('#edit-offres-modal input[name="nom"]').val(offreName);
            $('#edit-offres-modal input[name="description"]').val(offreDescription);
            $('#edit-offres-modal input[name="prix"]').val(offrePrix);
            $('#edit-offres-modal input[name="tva"]').val(offreTva);
            $('#edit-offres-modal input[name="estimationtime"]').val(offreEstimationTime);
        });



        $(document).ready(function() {
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
                                    url: '/dashboard/offres/' + id,
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





        });
    </script>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card mb-2 mt-2">

            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>Offres</h3>
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                        data-bs-target="#addOffreModal">Ajouter Offres</button>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Nom Offre</th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>Tva</th>
                                <th>Estimation Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($offres as $index=>$offre)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{ $offre->nom }}</td>
                                    <td>{{ $offre->description }}</td>
                                    <td>{{ $offre->prix }}</td>
                                    <td>{{ $offre->tva }} %</td>
                                    <td>{{ $offre->estimationtime }} Hr</td><span class="badge text-bg-success">Success</span>
                                    @if($offre->status)

                                    <td><span class="badge  btn-success p-1">Activé</span></td>
                                    @else
                                    <td><span class="badge btn-danger p-1">Désactivée</span></td>

                                    @endif
                                    <td>
                                        <button class="btn btn-sm btn-primary edit-offre-btn" data-bs-toggle="modal"
                                            data-bs-target="#edit-offres-modal" data-action="{{ route('offres.update',  $offre) }}"
                                            data-offres-id="{{ $offre->id }}"
                                            data-offres-nom="{{ $offre->nom }}"
                                            data-offres-description="{{ $offre->description }}"
                                            data-offres-prix="{{ $offre->prix }}"
                                            data-offres-tva="{{ $offre->tva }}"
                                            data-offres-estimationtime="{{ $offre->estimationtime }}"                                            >
                                            Modifier
                                        </button>
                                            <button type="button" class="btn btn-sm btn-danger delete-btn" 
                                                data-id="{{$offre->id}}">Supprimer </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Country Modal -->
    <div class="modal fade" id="addOffreModal" tabindex="-1" aria-labelledby="addOffreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOffreModalLabel">Ajouter Offres</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('offres.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom Offre</label>
                            <input type="text" class="form-control" id="nom" name="nom" required placeholder="Nom Offre">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="edit-offre-description" name="description" placeholder="description"
                            required>
                        </div>
                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="text" class="form-control" id="edit-offre-prix" name="prix" placeholder="prix"
                            required>
                        </div>
                        <div class="mb-3">
                            <label for="tva" class="form-label">Tva</label>
                            <input type="text" class="form-control" id="edit-offre-tva" name="tva" placeholder="tva"
                            required>
                        </div>
                        <div class="mb-3">
                            <label for="estimationtime" class="form-label">Estimation time</label>
                            <input type="text" class="form-control" id="edit-offre-estimationtime" name="estimationtime" placeholder="Estimation time"
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
                    Êtes-vous sûr de vouloir supprimer ce offre ?
                </div>
                <div class="modal-footer">
                   
                    <button type="button" class="btn btn-secondary closeDelete"  data-dismiss="modal"  aria-label="Close">Annuler</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for edit -->

    <div class="modal fade" id="edit-offres-modal" tabindex="-1" role="dialog" aria-labelledby="edit-offres-modal-title"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form  method="POST" id="edit-offres-modal">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-offres-modal-title">Modifier offre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-offres-nom">Nom offre</label>
                            <input type="text" class="form-control" id="edit-offres-nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-offres-description">Description</label>
                            <input type="text" class="form-control" id="edit-offres-description" name="description"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="edit-offres-prix">Prix</label>
                            <input type="text" class="form-control" id="edit-offres-prix" name="prix"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="edit-offres-tva">Tva</label>
                            <input type="text" class="form-control" id="edit-offres-tva" name="tva"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="edit-offres-estimationtime">Estimation time</label>
                            <input type="text" class="form-control" id="edit-offres-estimationtime" name="estimationtime"
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
@endsection
