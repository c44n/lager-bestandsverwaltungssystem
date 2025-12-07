@extends('admin.admin_master')
@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Produkt Kategorien</h4>
                </div>

                <ol class="breadcrumb m-0 py-0">

                    <!-- Default Modals -->
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#add_product_category_modal">
                            Kategorie hinzufügen
                        </button>
                    </div>

                    <!-- Default Modal -->
                    <div class="modal fade" id="add_product_category_modal" tabindex="-1"
                        aria-labelledby="standard-modalLabel" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="standard-modalLabel">Produktkategorie erstellen
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('store.category') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="col-12">
                                                <label for="input_name" class="form-label">Kategorie Name</label>
                                                <input type="text" class="form-control" name="name" id="name">
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Speichern</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </ol>
            </div>

            <!-- Datatables  -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title mb-0">Übersicht</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Aktion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->category_name }}</td>
                                            <td>{{ $item->category_slug }}</td>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.customer', $item->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <a href="{{ route('delete.customer', $item->id) }}"
                                                    class="btn btn-sm btn-danger" id="delete">Löschen</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->

    </div>
@endsection
