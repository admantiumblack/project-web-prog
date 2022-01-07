@extends('layout.master')

@section('title', 'Home')

@section('content')

    <div class="row row-cols-1 row-cols-lg-2 p-3 m-2">
        <div class="col-lg-9">
            <div class="px-2 mb-3"><h1>Active Forms</h1></div>
            <div class="card">
                <div class="card-body">
                    <div class="list-group">
                        @forelse($forms as $form)
                            <a class="list-group-item list-group-item-action" href="/form">
                                <h6 class="h5">{{ $form->subject }}</h5>
                                    Deadline: {{ $form->deadline }}
                            </a>
                        @empty
                            No forms
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="row row-cols-1 p-0">
                <div class="col m-0 mb-2">
                    <div class="mb-1">Complaint Ticket</div>
                    <div class="card p-0">
                        <button type="button" class="card-body btn btn-danger text-white" id="ticket-btn"
                            data-bs-toggle="modal" data-bs-target="#ticketModal">
                            New complaint ticket
                        </button>
                        <div class="modal fade" id="ticketModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Complaint Ticket</h5>
                                    </div>
                                    {{-- <form action="API URL" method="POST"> --}}
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="modal-body row gy-2">
                                            <div>
                                                <label for="complaintTitle">Title:</label>
                                                <input type="text" class="form-control" placeholder="Insert title here"
                                                    name="title" id="complaintTitle" />
                                            </div>
                                            <label for="selectCourses">Select Courses:</label>
                                            <div>
                                                <select class="container custom-select custom-select-lg p-3 mt-0">
                                                    <option selected>No Course Selected
                                                    </option>
                                                    {{-- @forelse ($courses as $course)
                                                        <option selected>$('select[name=selValue]').val(1)</option>
                                                        <option value="1">One</option>
                                                    @empty
    
                                                    @endforelse --}}
                                                </select>
                                            </div>
                                            <div>
                                                <label for="complaintMessage">Message:</label>
                                                <textarea class="form-control" placeholder="Insert message here"
                                                    name="title" id="complaintTitle" rows="8"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col m-0 mb-2">
                    <div class="mb-1">Create Form</div>
                    <div class="card p-0">
                        <button type="button" class="card-body btn btn-primary text-white" id="ticket-btn"
                            data-bs-toggle="modal" data-bs-target="#formcreateModal">
                            New review form
                        </button>
                        <div class="modal fade" id="formcreateModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New form</h5>
                                    </div>
                                    {{-- <form action="API URL" method="POST"> --}}
                                    <form action="" method="POST">
                                        @csrf
                                        {{-- <input type="hidden" value="SCC ID HERE"> --}}
                                        <input type="hidden" value="">
                                        <div class="modal-body row gy-2">
                                            <div>
                                                <label for="complaintMessage">Period:</label>
                                                <input type="text" class="form-control" name="period"
                                                    placeholder="Insert period here">
                                            </div>
                                            <div>
                                                <label for="formDeadline">Deadline:</label>
                                                <input type="date" class="form-control" name="deadline">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
