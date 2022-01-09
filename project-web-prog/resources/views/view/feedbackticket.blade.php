@extends('layout.master')

@section('title', 'Feedback Ticket')

@section('content')
    <div class="container-xxl mt-4">
        <div class="px-2 mb-3 text-center">
            <h1>Feedback Ticket</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered border border-3 border-dark align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="col-1 text-center">No</th>
                            <th class="col-1 text-center">Course Id</th>
                            <th class="col-1 text-center">Course Name</th>
                            <th class="col-2 text-center">Issue</th>
                            <th class="col-5 text-center">Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($complaints as $key => $complaint)
                            <tr>
                                <td class="text-center">
                                    {{ $key + 1 }}
                                </td>
                                <td class="text-center">
                                    {{ $complaint->subject_id }}
                                </td>
                                <td class="">
                                    {{ $complaint->subject }}
                                </td>
                                <td class="">
                                    {{ $complaint->title }}
                                </td>
                                <td class="">
                                    {{ $complaint->content }}
                                </td>
                            </tr>
                        @empty
                            <h2 class="text-center">No Feedback Recently</h2>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
