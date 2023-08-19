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

 

        $(document).on('click', '.edit-category-btn', function() {
            var action = $(this).data('action');

            var categoryId = $(this).data('category-id');
            var categoryName = $(this).data('category-name');
             

            $('#edit-category-modal form').attr('action', action);
            $('#edit-category-modal input[name="name"]').val(categoryName);
           
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
                                    url: '/dashboard/categories/' + id,
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
                    <h3>Catégories</h3>
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                        data-bs-target="#addCategoryModal">Ajouter Catégories</button>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Nom Catégories</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $index => $category)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{ $category->name }}</td>
                                 
                                    <td>
                                        <button class="btn btn-sm btn-primary edit-category-btn" data-bs-toggle="modal"
                                            data-bs-target="#edit-category-modal" data-action="{{ route('categories.update',  $category->id) }}" data-category-id="{{ $category->id }}"
                                            data-category-name="{{ $category->name }}" 
                                            >
                                            Modifier
                                        </button>
                                            <button type="button" class="btn btn-sm btn-danger delete-btn" 
                                                data-id="{{$category->id}}">Supprimer </button>

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
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Ajouter Catégories</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom Catégories</label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="name category">
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
                    Êtes-vous sûr de vouloir supprimer ce Catégories ?
                </div>
                <div class="modal-footer">
                   
                    <button type="button" class="btn btn-secondary closeDelete"  data-dismiss="modal"  aria-label="Close">Annuler</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for edit -->

    <div class="modal fade" id="edit-category-modal" tabindex="-1" role="dialog" aria-labelledby="edit-category-modal-title"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form  method="POST" id="edit-category-modal">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-category-modal-title">Modifier Catégories</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-Catégories-nom">Nom category</label>
                            <input type="text" class="form-control" id="edit-category-name" name="name" required>
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
