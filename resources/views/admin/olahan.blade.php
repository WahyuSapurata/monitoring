@extends('layout.adminlayout')
@section('title', 'Olahan')
@section('content')

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content p-4">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Tables</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-heart-monitor"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Table Pipa</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Olahan
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pipa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/olahan_add" method="POST" class="row g-3">
                                        @csrf
                                        <label>Air Baku</label>
                                        <div class="col-md-6">
                                            <label for="formGroupExampleInput" class="form-label">NTV</label>
                                            <input type="text" name="ntv_baku" class="form-control"
                                                id="formGroupExampleInput" placeholder="Example input placeholder">
                                            {{-- @error('name')
                                                <div id="validationServer03Feedback" class="invalid-feedback text-start">
                                                    {{ $message }}
                                                </div>
                                            @enderror --}}
                                        </div>
                                        <div class="col-md-6">
                                            <label for="formGroupExampleInput" class="form-label">PH</label>
                                            <input type="text" name="ph_baku" class="form-control"
                                                id="formGroupExampleInput" placeholder="Example input placeholder">
                                            {{-- @error('name')
                                                <div id="validationServer03Feedback" class="invalid-feedback text-start">
                                                    {{ $message }}
                                                </div>
                                            @enderror --}}
                                        </div>
                                        <hr class="mb-0">
                                        <label>Air Sedimen</label>
                                        <div class="col-md-6">
                                            <label for="formGroupExampleInput" class="form-label">NTV</label>
                                            <input type="text" name="ntv_sendimen" class="form-control"
                                                id="formGroupExampleInput" placeholder="Example input placeholder">
                                            {{-- @error('name')
                                                <div id="validationServer03Feedback" class="invalid-feedback text-start">
                                                    {{ $message }}
                                                </div>
                                            @enderror --}}
                                        </div>
                                        <div class="col-md-6">
                                            <label for="formGroupExampleInput" class="form-label">PH</label>
                                            <input type="text" name="ph_sendimen" class="form-control"
                                                id="formGroupExampleInput" placeholder="Example input placeholder">
                                            {{-- @error('name')
                                                <div id="validationServer03Feedback" class="invalid-feedback text-start">
                                                    {{ $message }}
                                                </div>
                                            @enderror --}}
                                        </div>
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Nama Pipa</label>
                                            <select name="pipa_id" id="pipa_id" class="form-select">
                                                <option value="">Pilih</option>
                                                @foreach ($pipa as $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                            {{-- @error('name')
                                                <div id="validationServer03Feedback" class="invalid-feedback text-start">
                                                    {{ $message }}
                                                </div>
                                            @enderror --}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th colspan="2">Air Baku</th>
                                    <th colspan="2">Air Sendimen</th>
                                </tr>
                                <tr>
                                    <th>NTV</th>
                                    <th>Ph</th>
                                    <th>NTV</th>
                                    <th>Ph</th>
                                    <th class="text-center">Pipa</th>
                                    <th class="text-center">Petugas</th>
                                    <th class="text-center">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($olahan as $data)
                                    <tr>
                                        <td>{{ $data->ntv_baku }}</td>
                                        <td>{{ $data->ph_baku }}</td>
                                        <td>{{ $data->ntv_sendimen }}</td>
                                        <td>{{ $data->ph_sendimen }}</td>
                                        <td>{{ $data->pipa->name }}</td>
                                        <td>{{ $data->petugas }}</td>
                                        <td>
                                            @if (Auth::user()->name == $data->petugas)
                                                <button type="button" class="btn btn-warning pt-0 pb-0"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $data->id }}">
                                                    edit
                                                </button>
                                                <form action="/pipa_delete/{{ $data->id }}" method="POST"
                                                    class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger pt-0 pb-0 show_confirm">Delete</button>
                                                </form>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Olahan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/olahan_edit/{{ $data->id }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row g-3">
                                                            <label>Air Baku</label>
                                                            <div class="col-md-6">
                                                                <label for="formGroupExampleInput"
                                                                    class="form-label">NTV</label>
                                                                <input type="text" name="ntv_baku"
                                                                    class="form-control" id="formGroupExampleInput"
                                                                    placeholder="Example input placeholder"
                                                                    value="{{ $data->ntv_baku }}">
                                                                {{-- @error('name')
                                                                <div id="validationServer03Feedback" class="invalid-feedback text-start">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror --}}
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="formGroupExampleInput"
                                                                    class="form-label">PH</label>
                                                                <input type="text" name="ph_baku" class="form-control"
                                                                    id="formGroupExampleInput"
                                                                    placeholder="Example input placeholder"
                                                                    value="{{ $data->ph_baku }}">
                                                                {{-- @error('name')
                                                                <div id="validationServer03Feedback" class="invalid-feedback text-start">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror --}}
                                                            </div>
                                                            <hr class="mb-0">
                                                            <label>Air Sedimen</label>
                                                            <div class="col-md-6">
                                                                <label for="formGroupExampleInput"
                                                                    class="form-label">NTV</label>
                                                                <input type="text" name="ntv_sendimen"
                                                                    class="form-control" id="formGroupExampleInput"
                                                                    placeholder="Example input placeholder"
                                                                    value="{{ $data->ntv_sendimen }}">
                                                                {{-- @error('name')
                                                                <div id="validationServer03Feedback" class="invalid-feedback text-start">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror --}}
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="formGroupExampleInput"
                                                                    class="form-label">PH</label>
                                                                <input type="text" name="ph_sendimen"
                                                                    class="form-control" id="formGroupExampleInput"
                                                                    placeholder="Example input placeholder"
                                                                    value="{{ $data->ph_sendimen }}">
                                                                {{-- @error('name')
                                                                <div id="validationServer03Feedback" class="invalid-feedback text-start">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror --}}
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="formGroupExampleInput" class="form-label">Nama
                                                                    Pipa</label>
                                                                <select name="pipa_id" id="pipa_id"
                                                                    class="form-select">
                                                                    {{-- <option value="{{ $data->pipa->id }}">
                                                                        {{ $data->pipa->name }}</option> --}}
                                                                    @foreach ($pipa as $column)
                                                                        <option value="{{ $column->id }}"
                                                                            {{ $data->id == $column->id ? 'selected' : '' }}>
                                                                            {{ $column->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                {{-- @error('name')
                                                                <div id="validationServer03Feedback" class="invalid-feedback text-start">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror --}}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="reset" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->

@endsection
