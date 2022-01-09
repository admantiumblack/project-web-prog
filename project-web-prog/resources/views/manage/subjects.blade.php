@extends('layout.master')

@section('title', 'Manage Courses')

@section('content')
    <div class="row row-cols-1 row-cols-lg-2 p-3 m-2">
        <div class="col-lg-9">
            <div class="px-2 mb-3"><h1>Manage stuff idk man</h1></div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('manage')}}" method="GET" id="searchLecture">
                        @csrf
                        <div class="row m-0 gy-2">
                            <div class="col">
                            <label for="selectRumpunan">Select Rumpunan:</label>
                                <select class="form-select" onchange="this.form.submit()" name="cluster_id">
                                    <option {{$cluster_choice == -1? 'selected':''}} value="-1">All</option>
                                    @forelse ($clusters as $cluster)
                                    <option {{$cluster_choice == $cluster->id? 'selected':''}} value="{{$cluster->id}}">{{$cluster->id}} - {{$cluster->cluster}}</option>
                                    @empty
                                    <option selected>No Cluster Available
                                    </option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col">
                                <label for="selectPeriod">Select Period:</label>
                                <select class="form-select" onchange="this.form.submit()" name="period">
                                    <option {{$period_choice == -1? 'selected':''}} value="-1">All</option>
                                    @forelse ($periods as $period)
                                    <option {{$period_choice == $period->period? 'selected':''}} value="{{$period->period}}">{{$period->period}}</option>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Manage Fuck</h5>
                                    </div>
                                    {{-- <form action="API URL" method="POST"> --}}
                                    <form action="{{route('api.complaint.insert')}}" method="POST" id="uploadForm">
                                        @csrf
                                        <div class="modal-body row m-0 gy-2">
                                            <label for="selectCourses">Periode:</label>
                                            <div>
                                                <input type="text" name="period" id="" placeholder="example: 221">
                                            </div>
                                            <div class="form-control">
                                                <label for="username">Upload files</label>
                                                <input type="file" name="csv" id="insert_data" placeholder="must be csv">
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
                @forelse ($lecturers as $lecturer)
                    <tr>
                        <td>{{$lecturer->name}}</td>
                        <td>{{$lecturer->id}}</td>
                        <td>
                            @foreach ($lecturer->subjectLecturers as $subjectLecturer)
                                ({{$subjectLecturer->subject->cluster->cluster}}) {{$subjectLecturer->subject->id}} - {{$subjectLecturer->subject->subject}} ({{$subjectLecturer->period}}) <br>
                            @endforeach
                        </td>
                    </tr>
                @empty
                    
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
                @endforelse
            </tbody>
        </table>
@endsection
