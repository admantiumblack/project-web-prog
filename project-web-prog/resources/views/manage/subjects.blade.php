@extends('layout.master')

@section('title', 'Manage Courses')

@section('content')
    <div class="row row-cols-1 row-cols-lg-2 p-3 m-2">
        <div class="col-lg-9">
            <div class="px-2 mb-3"><h1>Manage stuff idk man</h1></div>
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST" id="searchLecture">
                        @csrf
                        <div class="row m-0 gy-2">
                            <div class="col">
                            <label for="selectRumpunan">Select Rumpunan:</label>
                                <select class="form-select" onchange="this.form.submit()">
                                    {{-- @forelse (Query Rumpunan)
                                    <option selected value="{{}}">(Query Rumpunan)</option>
                                    @empty --}}
                                    <option selected>No Rumpunan Available
                                    </option>
                                    <option selected>No Rumpunan Available
                                    </option>
                                    <option selected>No Rumpunan Available
                                    </option>
                                    <option selected>No Rumpunan Available
                                    </option>
                                    {{-- @endforelse --}}
                                </select>
                            </div>
                            <div class="col">
                                <label for="selectPeriod">Select Period:</label>
                                <select class="form-select" onchange="this.form.submit()">
                                    {{-- @forelse (Query Period)
                                    <option selected value="{{}}">(Query Period)</option>
                                    @empty --}}
                                    <option selected>No Period Available
                                    </option>
                                    <option selected>No Period Available
                                    </option>
                                    <option selected>No Period Available
                                    </option>
                                    <option selected>No Period Available
                                    </option>
                                    <option selected>No Period Available
                                    </option>
                                    {{-- @endforelse --}}
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="row row-cols-1 p-0">
                <div class="col m-0 mb-2">
                    <div class="mb-1">Upload Data</div>
                    <div class="card p-0">
                        <button type="button" class="card-body btn btn-danger text-white" id="upload-btn"
                            data-bs-toggle="modal" data-bs-target="#ticketModal">
                            Manage Subjects
                        </button>
                        <div class="modal fade" id="ticketModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Manage Fuck</h5>
                                    </div>
                                    {{-- <form action="API URL" method="POST"> --}}
                                    <form action="{{route('api.complaint.insert')}}" method="POST" id="uploadForm">
                                        @csrf
                                        <div class="modal-body row m-0 gy-2">
                                            <label for="selectCourses">Select Periode:</label>
                                            <div>
                                                <select class="form-select" name="subject_id">
                                                    {{-- @forelse (Query Period)
                                                    <option selected value=""></option>
                                                    @empty --}}
                                                    <option selected>No Period Available
                                                    </option>
                                                    <option selected>No Period Available
                                                    </option>
                                                    <option selected>No Period Available
                                                    </option>
                                                    <option selected>No Period Available
                                                    </option>
                                                    <option selected>No Period Available
                                                    </option>
                                                    {{-- @endforelse --}}
                                                </select>
                                            </div>
                                            <div class="form-control">
                                                <label for="username">Upload files</label>
                                                <input type="file" name="insert_data" id="insert_data">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" form="uploadForm">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th class="col-3">Nama Dosen</th>
                    <th class="col-2">Kode Dosen</th>
                    <th class="col-3">Subjects</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sean Oswald Ramli</td>
                    <td>D6900</td>
                    <td>(Query Subjects)</td>
                </tr>
                <tr>
                    <td>Roland</td>
                    <td>D0001</td>
                    <td>(Query Subjects)</td>
                </tr>
                <tr>
                    <td>Samuel Yang</td>
                    <td>D0420</td>
                    <td>(Query Subjects)</td>
                </tr>
            </tbody>
        </table>
@endsection
