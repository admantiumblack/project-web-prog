@extends('layout.master')

@section('title', 'Manage Courses')

@section('content')
    <div class="row row-cols-1 row-cols-lg-2 p-3 m-2">
        <div class="col-lg-9">
            <div class="px-2 mb-3">
                <h1>Manage Subjects</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('manage') }}" method="GET" id="searchLecture">
                        @csrf
                        <div class="row m-0 gy-2">
                            <div class="col">
                                <label for="selectRumpunan">Select Rumpunan:</label>
                                <select class="form-select" onchange="this.form.submit()" name="cluster_id">
                                    <option {{ $cluster_choice == -1 ? 'selected' : '' }} value="-1">All</option>
                                    @forelse ($clusters as $cluster)
                                        <option {{ $cluster_choice == $cluster->id ? 'selected' : '' }}
                                            value="{{ $cluster->id }}">{{ $cluster->id }} - {{ $cluster->cluster }}
                                        </option>
                                    @empty
                                        <option selected>No Cluster Available
                                        </option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col">
                                <label for="selectPeriod">Select Period:</label>
                                <select class="form-select" onchange="this.form.submit()" name="period">
                                    <option {{ $period_choice == -1 ? 'selected' : '' }} value="-1">All</option>
                                    @forelse ($periods as $period)
                                        <option {{ $period_choice == $period->period ? 'selected' : '' }}
                                            value="{{ $period->period }}">{{ $period->period }}</option>
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
                                    <form action="{{ route('api.subject.upload') }}" method="POST" id="uploadForm"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body row m-0 gy-2">
                                            <label for="selectCourses">Periode:</label>
                                            <div>
                                                <textarea class="form-control" name="period" id="" style="resize:none"
                                                    rows="1" placeholder="example: 221" required></textarea>
                                                {{-- <input  type="text" name="period" id="" placeholder=""> --}}
                                            </div>
                                            <div class="">
                                                <label for="username">Upload files:</label>
                                                <br>
                                                <input type="file" name="file" id="insert_data" placeholder="must be csv">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
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
    <div class="container-xxl mt-4">
        <div class="card">

            <div class="card-body">
                <table class="table table-bordered border border-3 border-dark align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="col-3 text-center">Nama Dosen</th>
                            <th class="col-2 text-center">Kode Dosen</th>
                            <th class="col-5 text-center">Subjects</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lecturers as $lecturer)
                            <tr>
                                <td class="text-center">{{ $lecturer->name }}</td>
                                <td class="text-center">{{ $lecturer->id }}</td>
                                <td>
                                    @foreach ($lecturer->subjectLecturers as $subjectLecturer)
                                        ({{ $subjectLecturer->subject->cluster->cluster }})
                                        {{ $subjectLecturer->subject->id }} - {{ $subjectLecturer->subject->subject }}
                                        ({{ $subjectLecturer->period }}) <br>
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>No Dosens Available</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
