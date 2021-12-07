@extends('layout.master')

@section('title', 'Home')

@section('content')

    <div class="d-flex flex-row">
        <div class="col col-9">
            <div class="mb-1">Forms</div>
            <div class="card">
                <div class="c-card-content">
                    <div class="list-group">
                        @forelse($forms as $form)
                            <a class="list-group-item list-group-item-action" href="/form">
                                <h6 class="h5">{{$form->subject}}</h5>
                                Deadline: {{$form->deadline}}
                            </a>
                        @empty
                            No forms
                        @endforelse
                        </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="mb-1">Complaint Ticket</div>
            <div class="card">
                <button type="button" class="c-card-content btn btn-danger text-white" id="ticket-btn" data-toggle="modal" data-target="#exampleModal">
                    New complaint ticket
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        </div>
                        <div class="modal-body">
                            {{-- TO-DO Complaint ticket form --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>


@endsection