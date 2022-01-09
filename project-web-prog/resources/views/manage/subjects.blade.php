@extends('layout.master')

@section('title', 'Manage Courses')

@section('content')
    {{-- <h1>{{$cluster}} and {{$period}}</h1> --}}
    <div class="row row-cols-1 row-cols-lg-2 p-3 m-2">
        <div class="col-lg-9">
            <div class="px-2 mb-3"><h1>Manage Courses for Dean</h1></div>
            <div class="card">
                <div class="card-body">
                    <form action="/manage" method="POST" id="searchLecture">
                        @csrf
                        <div class="row m-0 gy-2">
                            <div class="col">
                            <label for="selectRumpunan">Select Rumpunan:</label>
                                <select class="form-select" onchange="this.form.submit()" name="cluster">
                                    @forelse ($clusters as $item)
                                    @if ($item->id == $cluster)
                                    <option selected value="{{$item->id}}">{{$item->cluster}}</option>
                                    @else
                                    <option value="{{$item->id}}">{{$item->cluster}}</option>
                                    @endif
                                    @empty
                                    <option selected>No Rumpunan Available
                                    </option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col">
                                <label for="selectPeriod">Select Period:</label>
                                <select class="form-select" onchange="this.form.submit()" name="period">
                                    @forelse ($periods as $item)
                                    @if ($item == $period)
                                    <option selected value="{{$item}}">{{$item}}</option>
                                    @else
                                    <option value="{{$item}}">{{$item}}</option>
                                    @endif
                                    @empty
                                    <option selected>No Period Available
                                    </option>
                                    @endforelse
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
                                        <h5 class="modal-title" id="exampleModalLabel">Assign Subject</h5>
                                    </div>
                                    {{-- <form action="API URL" method="POST"> --}}
                                    <form action="{{route('api.complaint.insert')}}" method="POST" id="uploadForm">
                                        @csrf
                                        <div class="modal-body row m-0 gy-2">
                                            <label for="selectCourses">Select Periode:</label>
                                            <div>
                                                <select class="form-select" name="subject_id">
                                                    @forelse ($periods as $period)
                                                    <option selected value="{{$period}}">{{$period}}</option>
                                                    @empty
                                                    <option selected>No Period Available
                                                    </option>
                                                    @endforelse
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
                @forelse ($dosens as $dosen)
                <tr>
                    <td>{{$dosen->name}}</td>
                    <td>{{$dosen->id}}</td>
                    <td>{{$dosen->subject}}</td>
                </tr>
                @empty
                <tr>
                    <td>No Dosens Available</td>
                </tr>
                @endforelse

            </tbody>
        </table>
@endsection
