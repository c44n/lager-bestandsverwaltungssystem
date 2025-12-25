@extends('admin.admin_master')
@section('admin')
    <div class="content d-flex flex-column flex-column-fluid">
        <div class="d-flex flex-column-fluid">
            <div class="container-fluid my-0">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h2 class="fs-22 fw-semibold m-0">Produkt Details</h2>
                    </div>

                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <a href="{{ route('all.product') }}" class="btn btn-dark">Zurück</a>
                        </ol>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 col-12">
                                <h5 class="mb-3">Produktbild</h5>
                                <div class="d-flex flex-wrap">
                                    @forelse ($product->images as $img)
                                        <img src="{{ asset($img->image) }}" class="me-2 mb-2 border rounded" width="100"
                                            height="100" alt="Produktbild" style="object-fit:cover">
                                    @empty
                                        <p>Kein Bild vorhanden</p>
                                    @endforelse
                                </div>
                            </div>

                            <div class="col-md-7 col-12">
                                <h5 class="mb-3">Produktinformation</h5>
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Name: </strong>{{ $product->name }}</li>
                                    <li class="list-group-item"><strong>Code: </strong>{{ $product->code }}</li>
                                    <li class="list-group-item"><strong>Hersteller: </strong>{{ $product->brand->name }}</li>
                                    <li class="list-group-item"><strong>Lager: </strong>{{ $product->warehouse->name }}</li>
                                    <li class="list-group-item"><strong>Lieferat: </strong>{{ $product->supplier->name }}</li>
                                    <li class="list-group-item"><strong>Kategorie: </strong>{{ $product->category->category_name }}</li>
                                    <li class="list-group-item"><strong>Preis: </strong>{{ $product->price }}</li>
                                    <li class="list-group-item"><strong>Warnung ab: </strong>{{ $product->stock_alert }}</li>
                                    <li class="list-group-item"><strong>Verfügbarkeit-Anzahl: </strong>{{ $product->product_qty }}</li>
                                    <li class="list-group-item"><strong>Status: </strong>{{ $product->status }}</li>
                                    <li class="list-group-item"><strong>Bemerkung: </strong>{{ $product->note }}</li>
                                    <li class="list-group-item"><strong>Erstellt: </strong>{{ $product->created_at->format('d.m.Y') }}</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
