@extends('layout.master')

@section('title', 'Form Result')

@section('content')

    <div class="row row-cols-1 row-cols-lg-2 p-3 m-2">
        <div class="col-lg-9">
            {{-- <div class="px-2 mb-3"><h1>All Forms - {{ rumpun }}</h1></div> --}}
            <div class="px-2 mb-3"><h1>All Forms - Microsystems</h1></div>
            <div class="card">
                <div class="card-body">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th class="col-5">Mata kuliah</th>
                                <th class="col-2">Period</th>
                                <th class="col-3">Deadline</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @forelse()
                                <tr>
                                    <td>COMP177014 - Advanced Micro Devices</td>
                                    <td>Yesterday</td>
                                    <td>None</td>
                                    <td>
                                        <a class="btn btn-primary" href="#">View</a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse --}}
                            <tr>
                                <td>COMP177014 - Advanced Micro Devices</td>
                                <td>Yesterday</td>
                                <td>2022年02月30日</td>
                                <td>
                                    <a class="btn btn-primary" href="#">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>COMP105 - Superconductors</td>
                                <td>Missed</td>
                                <td>Around 8 months</td>
                                <td>
                                    <a class="btn btn-primary" href="#">View</a>
                                </td>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection