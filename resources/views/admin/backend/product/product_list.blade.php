@extends('admin.admin_master')
@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Produkte</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <a href="{{ route('add.customer') }}" class="btn btn-secondary">Produkt hinzufügen</a>
                    </ol>
                </div>
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
                                        <th>Bild</th>
                                        <th>Name</th>
                                        <th>Lager</th>
                                        <th>Preis</th>
                                        <th>Stückzahl</th>
                                        <th>Im Sortiment seit</th>
                                        <th>Aktion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                @php
                                                    $primaryImage =
                                                        $item->image->first()->image ?? '/upload/no_image.jpg';
                                                @endphp
                                                <img src="{{ asset($primaryImage) }}" alt="img" width="40px">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->warehouse_id }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                @if ($item->product_qty <= 3)
                                                    <span class="badge text-bg-danger">{{ $item->product_qty }}</span>
                                                @else
                                                    <h4>
                                                        <span
                                                            class="badge text-bg-secondary">{{ $item->product_qty }}</span>
                                                    </h4>
                                                @endif
                                            </td>
                                            <td>{{ $item->address }}</td>
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
