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

            var produitId = $(this).data('produit-id');
            var produitName = $(this).data('produit-name');
            var produitPrix = $(this).data('produit-prix');
           // var produitImage = $(this).data('produit-image');
            var produitDescription = $(this).data('produit-description');
            var produitCatId = $(this).data('produit-categorie_id');



            $('#edit-category-modal form').attr('action', action);
            $('#edit-category-modal input[name="name"]').val(produitName);
            $('#edit-category-modal input[name="prix"]').val(produitPrix);
         //   $('#edit-category-modal input[name="image"]').val(produitImage);
            $('#edit-category-modal input[name="description"]').val(produitDescription);
            $('#edit-category-modal select[name="categorie_id"]').val(produitCatId);


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
                                    url: '/dashboard/produits/' + id,
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
                    <h3>Produits</h3>
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                        data-bs-target="#addCategoryModal">Ajouter Produit</button>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Nom Produit</th>
                                <th>Nom Catégorie</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($produits as $index => $produit)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{ $produit->name }}</td>
                                    <td>{{ $produit->category->name }}</td>
                                    <!-- <td>{{ $produit->image }}</td> -->
                                    <td><img   src="{{ Storage::url($produit->image) }}" class="avatar-xs" ></td>
                                    <td>{{ $produit->description }}</td>
                                    <td>{{ $produit->prix }}</td>

                                    <td>
                                        <button class="btn btn-sm btn-primary edit-category-btn" data-bs-toggle="modal"
                                            data-bs-target="#edit-category-modal" data-action="{{ route('produits.update',  $produit->id) }}" data-produit-id="{{ $produit->id }}"
                                            data-produit-description="{{ $produit->description }}"
                                            data-produit-name="{{ $produit->name }}"
                                            data-produit-prix="{{ $produit->prix }}"
                                            data-produit-image="{{ $produit->image }}"
                                            data-produit-categorie_id="{{ $produit->categorie_id }}"
                                            >
                                            Modifier
                                        </button>
                                            <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                data-id="{{$produit->id}}">Supprimer </button>

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
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Ajouter Produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom Produit</label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="name category">
                        </div>

                        <div class="mb-3">
                            <label for="cat" class="form-label">Nom category</label>
                            <select class="form-select" name="categorie_id" id="cat">
                            @foreach ($categories as $index => $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                            </select>
                            <!-- <input type="text" class="form-control" id="cat" name="cat" required placeholder="name category"> -->
                        </div>


                        <div class="mb-3">
                            <label for="image" class="form-label">image</label>
                            <input type="file" class="form-control" id="image" name="image" required placeholder="name category">
                        </div>



                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="text" class="form-control" id="prix" name="prix" required placeholder="name category">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description" required placeholder="name category">
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
                    Êtes-vous sûr de vouloir supprimer ce Produits ?
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
                <form  method="POST" id="edit-category-modal" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-category-modal-title">Modifier Produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <!-- <div class="form-group">
                            <label for="edit-Catégories-nom">Nom category</label>
                            <input type="text" class="form-control" id="edit-category-name" name="name" required>
                        </div> -->


                        <div class="mb-3">
                            <label for="name" class="form-label">Nom Produit</label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="name Produit">
                        </div>

                        <div class="mb-3">
                            <label for="cat" class="form-label">Nom category</label>
                            <select class="form-select" name="categorie_id" id="cat">
                            @foreach ($categories as $index => $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                            </select>
                            <!-- <input type="text" class="form-control" id="cat" name="cat" required placeholder="name category"> -->
                        </div>


                        <div class="mb-3">
                            <label for="image" class="form-label">image</label>
                            <input type="file" class="form-control" id="image" name="image" required  placeholder="name category">
                        </div>



                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="text" class="form-control" id="prix" name="prix" required placeholder="name category">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description" required placeholder="name category">
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
