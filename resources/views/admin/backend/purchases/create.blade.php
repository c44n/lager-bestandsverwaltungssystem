@extends('admin.admin_master')
@section('admin')
    <div class="content d-flex flex-column flex-column-fluid">
        <div class="d-flex flex-column-fluid">
            <div class="container-fluid my-4">
                <div class="d-md-flex align-items-center justify-content-between">
                    <h3 class="mb-0">Bestellung aufgeben</h3>
                    <div class="text-end my-2 mt-md-0"><a class="btn btn-outline-primary"
                            href="{{ route('purchases.index') }}">Zurück</a></div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <form action=" " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Datum: <span class="text-danger">*</span></label>
                                                <input type="date" name="date" value="<?= date('Y-m-d') ?>"
                                                    class="form-control">
                                                @error('date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="form-group w-100">
                                                    <label class="form-label" for="formBasic">Lager: <span
                                                            class="text-danger">*</span></label>
                                                    <select name="warehouse_id" id="warehouse_id"
                                                        class="form-control form-select">
                                                        <option value="">Lager auswählen</option>
                                                        @foreach ($warehouses as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <small id="warehouse_error" class="text-danger d-none">Bitte wählen Sie
                                                        zuerst das erste Warenlager aus.</small>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="form-group w-100">
                                                    <label class="form-label" for="formBasic">Lieferant: <span
                                                            class="text-danger">*</span></label>
                                                    <select name="supplier_id" id="supplier_id"
                                                        class="form-control form-select">
                                                        <option value="">Lieferant auswählen</option>
                                                        @foreach ($suppliers as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('supplier_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Produkt:</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                    <input type="search" id="product_search" name="search"
                                                        class="form-control" placeholder="Search product by code or name">
                                                </div>
                                                <div id="product_list" class="list-group mt-2"></div>
                                            </div>
                                        </div>




                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label">Order items: <span
                                                        class="text-danger">*</span></label>
                                                <table class="table table-striped table-bordered dataTable"
                                                    style="width: 100%;">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>Produkt</th>
                                                            <th>Kosten pro Stk.</th>
                                                            <th>Verfügbar</th>
                                                            <th>Anzahl</th>
                                                            <th>Rabatt</th>
                                                            <th>Gesamtbetrag</th>
                                                            <th>Aktion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 ms-auto">
                                                <div class="card">
                                                    <div class="card-body pt-7 pb-2">
                                                        <div class="table-responsive">
                                                            <table class="table border">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="py-3">Rabatt</td>
                                                                        <td class="py-3" id="displayDiscount">0.00 €</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="py-3">Versand</td>
                                                                        <td class="py-3" id="shippingDisplay">0.00 €</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="py-3 text-primary">Gesamtbetrag</td>
                                                                        <td class="py-3 text-primary" id="grandTotal">
                                                                            0.00 €</td>
                                                                        <input type="hidden" name="grand_total">
                                                                    </tr>


                                                                    <tr class="d-none">
                                                                        <td class="py-3">Beazhlter Betrag</td>
                                                                        <td class="py-3" id="paidAmount">
                                                                            <input type="text" name="paid_amount"
                                                                                placeholder="Enter amount paid"
                                                                                class="form-control">
                                                                        </td>
                                                                    </tr>
                                                                    <!-- new add full paid functionality  -->
                                                                    <tr class="d-none">
                                                                        <td class="py-3">Vollständig bezahlt</td>
                                                                        <td class="py-3" id="fullPaid">
                                                                            <input type="text" name="full_paid"
                                                                                id="fullPaidInput">
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="d-none">
                                                                        <td class="py-3">Offener Betrag</td>
                                                                        <td class="py-3" id="dueAmount">0.00 €</td>
                                                                        <input type="hidden" name="due_amount">
                                                                    </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">Rabatt: </label>
                                                <input type="number" id="inputDiscount" name="discount"
                                                    class="form-control" value="0.00">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Versand: </label>
                                                <input type="number" id="inputShipping" name="shipping"
                                                    class="form-control" value="0.00">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group w-100">
                                                    <label class="form-label" for="formBasic">Status: <span
                                                            class="text-danger">*</span></label>
                                                    <select name="status" id="status"
                                                        class="form-control form-select">
                                                        <option value="">Status auswählen</option>
                                                        <option value="Received">Erhalten</option>
                                                        <option value="Pending">Ausstehend</option>
                                                        <option value="Ordered">Bestellt</option>
                                                    </select>
                                                    @error('status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-2">
                                            <label class="form-label">Notiz: </label>
                                            <textarea class="form-control" name="note" rows="3" placeholder="Enter Notes"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="d-flex mt-5 justify-content-end">
                                    <button class="btn btn-primary me-3" type="submit">Speichern</button>
                                    <a class="btn btn-secondary" href="{{ route('purchases.index') }}">Abbrechen</a>
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
