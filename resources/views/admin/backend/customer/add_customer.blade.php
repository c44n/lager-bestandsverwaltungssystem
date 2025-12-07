@extends('admin.admin_master')
@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Kunde hinzufügen</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="{{ route('all.customer') }}">Zurück</a></li>
                    </ol>
                </div>
            </div>

            <!-- Form Validation -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Browser Defaults</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <form id="myForm" class="row g-3" action="{{ route('store.customer') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="col-6">
                                        <label for="validationDefault01" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-6">
                                        <label for="validationDefault01" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-6">
                                        <label for="validationDefault01" class="form-label">Telefon</label>
                                        <input type="number" class="form-control" name="phone">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-6">
                                        <label for="validationDefault01" class="form-label">Adresse</label>
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-6">
                                        <label for="validationDefault01" class="form-label">Stadt</label>
                                        <input type="text" class="form-control" name="city">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Speichern</button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>

        </div> <!-- container-fluid -->

    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    phone: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },

                },
                messages: {
                    name: {
                        required: 'Bitte fülle das Pflichtfeld aus.',
                    },
                    email: {
                        required: 'Bitte fülle das Pflichtfeld aus.',
                    },
                    phone: {
                        required: 'Bitte fülle das Pflichtfeld aus.',
                    },
                    address: {
                        required: 'Bitte fülle das Pflichtfeld aus.',
                    },
                    city: {
                        required: 'Bitte fülle das Pflichtfeld aus.',
                    },


                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
