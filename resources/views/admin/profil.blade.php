@extends('layout.adminlayout')
@section('title', 'Profil')
@section('content')

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">User Profile</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            @if (Session::has('status'))
                <div class="alert border-0 alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Success Alerts</h6>
                            <div class="text-white">{{ Session::get('message') }}</div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="container">
                <div class="main-body">
                    <form action="/profil_edit/{{ Auth::user()->id }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            @if (Auth::user()->image == null)
                                                <img src="/assets/images/avatars/avataruser.png" id="foto"
                                                    alt="Admin" class="rounded-circle p-1 bg-primary" width="110"
                                                    height="110">
                                            @else
                                                <img src="{{ asset('storage/photo/' . Auth::user()->image) }}"
                                                    id="foto" alt="Admin" class="rounded-circle p-1 bg-primary"
                                                    width="110" height="110">
                                            @endif

                                            <label for="file"> Edit
                                                <input type="file" name="photo" hidden id="file"
                                                    onchange="gambar(this.files[0], '#foto')" /></i></label>
                                            <div class="mt-3">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="mb-2">{{ Auth::user()->username }}</p>
                                                <button class="btn btn-light">Follow</button>
                                                <button class="btn btn-light">Message</button>
                                            </div>
                                        </div>
                                        <hr class="my-4" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Name</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ Auth::user()->name }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Username</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    value="{{ Auth::user()->username }}" disabled />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-light px-4">Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->

@endsection
