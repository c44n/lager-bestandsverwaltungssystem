@extends('admin.admin_master')
@section('admin')
    <div class="content d-flex flex-column flex-column-fluid">
        <div class="d-flex flex-column-fluid">
            <div class="container-fluid my-0">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h2 class="fs-22 fw-semibold m-0">Produkt bearbeiten</h2>
                    </div>

                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <a href="{{ route('all.product') }}" class="btn btn-dark">Zurück</a>
                        </ol>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Name: <span class="text-danger">*</span></label>
                                                <input type="text" name="name" value="{{ $editData->name }}"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Code: <span class="text-danger">*</span></label>
                                                <input type="text" name="code" class="form-control"
                                                    value="{{ $editData->code }}">

                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group w-100">
                                                    <label class="form-label" for="formBasic">Produktkategorie: <span
                                                            class="text-danger">*</span></label>
                                                    <select name="category_id" id="category_id"
                                                        class="form-control form-select">
                                                        <option value="">auswählen</option>
                                                        @foreach ($categories as $item)
                                                            <option {{ ($editData->category_id == $item->id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->category_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group w-100">
                                                    <label class="form-label" for="formBasic">Marke: <span
                                                            class="text-danger">*</span></label>
                                                    <select name="brand_id" id="brand_id" class="form-control form-select">
                                                        <option value="">auswählen</option>
                                                        @foreach ($brands as $item)
                                                            <option {{ ($editData->brand_id == $item->id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Preis: </label>
                                                <input type="text" name="price" class="form-control"
                                                    value="{{ $editData->price }}">

                                            </div>


                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Stock Alert: <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="stock_alert" class="form-control"
                                                    value="{{ $editData->stock_alert }}" min="0" required>

                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label">Notizen: </label>
                                                <textarea class="form-control" name="note" rows="3">{{ $editData->note }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="card">
                                        <label class="form-label">Bilder: <span class="text-danger">*</span></label>
                                        <div class="mb-3">
                                            <input name="image[]" accept=".png, .jpg, .jpeg" multiple="" type="file"
                                                id="multiImg" class="upload-input-file form-control">
                                        </div>

                                        <div class="row" id="preview_img"></div>
                                    </div>
                                    <div>
                                        <div class="col-md-12 mb-3">
                                            <h4 class="text-center">Vorhandene Menge: </h4>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group w-100">
                                                <label class="form-label" for="formBasic">Lager: <span
                                                        class="text-danger">*</span></label>
                                                <select name="warehouse_id" id="warehouse_id"
                                                    class="form-control form-select">
                                                    <option value="">auswählen</option>
                                                    @foreach ($warehouses as $item)
                                                        <option @selected($editData->warehouse_id == $item->id) value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group w-100">
                                                <label class="form-label" for="formBasic">Lieferant: <span
                                                        class="text-danger">*</span></label>
                                                <select name="supplier_id" id="supplier_id"
                                                    class="form-control form-select">
                                                    <option value="">auswählen</option>
                                                    @foreach ($suppliers as $item)
                                                        <option @selected($editData->supplier_id == $item->id)  value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Menge: <span class="text-danger">*</span></label>
                                            <input type="number" name="product_qty" class="form-control"
                                                value="{{ $editData->product_qty }}" min="1" required>

                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group w-100">
                                                <label class="form-label" for="formBasic">Status: <span
                                                        class="text-danger">*</span></label>
                                                <select name="status" id="status" class="form-control form-select">
                                                    <option selected="">auswählen</option>
                                                    <option value="Received" @selected(($editData->status ?? null) == 'Received') >Verfügbar</option>
                                                    <option value="Pending" @selected(($editData->status ?? null) == 'Pending')>Nicht verfügbar</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="d-flex mt-5 justify-content-start">
                                        <button class="btn btn-primary me-3" type="submit">Speichern</button>
                                        <a class="btn btn-secondary" href="{{ route('all.product') }}">Abbrechen</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
