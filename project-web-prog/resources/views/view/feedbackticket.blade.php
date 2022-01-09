@extends('layout.master')

@section('title', 'Feedback Ticket')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Feedback Ticket</h1>
        </div>
        <div class="card-body">
            @forelse ($complaints as $complaint)
                <table class="table table-light align-middle">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Course Id</th>
                            <th scope="col">Issue</th>
                            <th scope="col">Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                {{ $complaint->id + 1 }}
                            </th>
                            <th>
                                {{ $complaint->subject_id }}
                            </th>
                            <th>
                                {{ $complaint->title }}
                            </th>
                            <th>
                                {{ $complaint->content }}
                            </th>
                        </tr>
                    </tbody>
                </table>
            @empty
                <h2 class="text-center">No Feedback Recently</h2>
            @endforelse
        </div>
    </div>
@endsection
