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
                            @forelse($forms as $form)
                                <tr>
                                    <td>{{$form->subject}}</td>
                                    <td>{{$form->period}}</td>
                                    <td>{{$form->deadline}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="#">View</a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection