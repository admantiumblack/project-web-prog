@extends('layout.master')

@section('title', 'Feedback Ticket')

@section('content')
    <div class="row row-cols-1 row-cols-lg-2 p-3 m-2">
        <div class="col-lg-9">
            <div class="px-2 mb-3">
                <h1>Active Forms</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="list-group">
                        @forelse ($complaints as $complaint)
                            
                        @empty
                            
                        @endforelse
                        {{-- Looping forelse ticket --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
