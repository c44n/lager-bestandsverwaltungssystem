@extends('admin.admin_master')
@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Profile</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Components</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="{{ !empty($profileData->photo) ? asset('upload/user_images/' . $profileData->photo) : asset('upload/no_image.jpg') }}"
                                        class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">

                                    <div class="overflow-hidden ms-4">
                                        <h4 class="m-0 text-dark fs-20">{{ $profileData->name }}</h4>
                                        <p class="my-1 text-muted fs-16">{{ $profileData->email }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="text-muted bg-white">
                                <div class="pt-4" id="profile_setting">
                                    <div class="row">

                                        <div class="col-lg-6 col-xl-6">
                                            <div class="card border mb-0">
                                                <form action="{{ route('admin.profile.store') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h4 class="card-title mb-0">Personal Information</h4>
                                                            </div><!--end col-->
                                                        </div>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Name</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input class="form-control" type="text" name="name"
                                                                    value="{{ $profileData->name }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Telefon</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                            class="mdi mdi-phone-outline"></i></span>
                                                                    <input class="form-control" type="text"
                                                                        aria-describedby="basic-addon1" name="phone"
                                                                        value="{{ $profileData->phone }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Email</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                            class="mdi mdi-email"></i></span>
                                                                    <input type="text" class="form-control"
                                                                        name="email" placeholder="Email"
                                                                        aria-describedby="basic-addon1"
                                                                        value="{{ $profileData->email }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Adresse</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <textarea name="address" class="form-control" rows="2">{{ $profileData->address }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="formFile" class="form-label">Profilbild</label>
                                                            <input class="form-control" type="file" id="image"
                                                                name="photo">
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <div class="col-12">
                                                                <img id="showImage"
                                                                    src="{{ !empty($profileData->photo) ? asset('upload/user_images/' . $profileData->photo) : asset('upload/no_image.jpg') }}"
                                                                    class="rounded-circle avatar-xxl img-thumbnail float-start"
                                                                    alt="image profile">
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Speichern</button>
                                                    </div><!--end card-body-->
                                                </form>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-xl-6">
                                            <div class="card border mb-0">

                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h4 class="card-title mb-0">Passwort ändern</h4>
                                                        </div><!--end col-->
                                                    </div>
                                                </div>
                                                <form action="{{ route('admin.password.update') }}" method="post">
                                                    @csrf
                                                    <div class="card-body mb-0">
                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Altes Passwort</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input
                                                                    class="form-control @error('old_password') is-invalid @enderror"
                                                                    id="old_password" type="password"
                                                                    name="old_password">
                                                                @error('old_password')
                                                                    <span class="text text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Neues Passwort</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input
                                                                    class="form-control @error('new_password') is-invalid @enderror"
                                                                    id="new_password" type="password"
                                                                    name="new_password">
                                                                @error('new_password')
                                                                    <span class="text text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Neues Passwort bestätigen</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input class="form-control" type="password"
                                                                    id="new_password_confirmation" name="new_password_confirmation">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-12 col-xl-12">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Speichern</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div><!--end card-body-->
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end education -->

                        </div> <!-- Tab panes -->
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- container-fluid -->
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
