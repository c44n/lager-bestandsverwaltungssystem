@extends('admin.admin_master')
@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Marke hinzufügen</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="{{ route('all.brand') }}">Zurück</a></li>
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
                            <form class="row g-3" action="{{ route('store.brand') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="col-6">
                                        <label for="validationDefault01" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-6">
                                        <label for="validationDefault01" class="form-label">Bild</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <img id="showImage"
                                        src="{{ !empty($profileData->photo) ? asset('upload/user_images/' . $profileData->photo) : asset('upload/no_image.jpg') }}"
                                        class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
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

    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection
