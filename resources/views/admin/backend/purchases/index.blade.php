@extends('admin.admin_master')
@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Bestellungen</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <a href="{{ route('purchases.create') }}" class="btn btn-secondary">Bestellung hinzufügen</a>
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
                                        <th>Lager</th>
                                        <th>Status</th>
                                        <th>Gesamtbetrag</th>
                                        <th>Zahlungsart</th>
                                        <th>Erstellt</th>
                                        <th>Aktion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item['warehouse']->name }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->grand_total }}</td>
                                            <td>{{ $item->payment }} €</td>
                                            <td>Bar</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a title="Details" href="{{ route('details.product', $item->id) }}"
                                                    class="btn btn-sm btn-info">
                                                    <span class="mdi mdi-eye-outline mdi-18px"></span>
                                                </a>
                                                <a title="Edit" href="{{ route('edit.product', $item->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <span class="mdi mdi-pencil-outline mdi-18px"></span>
                                                </a>
                                                <a title="Delete" href="{{ route('delete.product', $item->id) }}"
                                                    class="btn btn-sm btn-danger" id="delete">
                                                    <span class="mdi mdi-trash-can-outline mdi-18px"></span>
                                                </a>
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
