@extends('layout.master')

@section('title', 'Form Result')

@section('content')

    <div class="container-xxl mt-4">
        {{-- <div class="px-2 mb-3"><h1>All Forms - {{ rumpun }}</h1></div> --}}
        <div class="px-2 mb-3 text-center">
            <h1>All Forms - Microsystems</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table border border-3 border-dark align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="col-5 text-center">Mata kuliah</th>
                            <th class="col-1 text-center">Period</th>
                            <th class="col-3 text-center">Deadline</th>
                            <th class="col-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($forms as $key => $form)
                            <tr>
                                <td>{{ $form->subject }}</td>
                                <td class="text-center">{{ $form->period }}</td>
                                <td class="text-center">{{ $form->deadline }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary" href="#">View Details</a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
