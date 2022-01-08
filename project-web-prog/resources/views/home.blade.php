@extends('layout.master')

@section('title', 'Home')

@section('content')

    <div class="row row-cols-1 row-cols-lg-2 p-3 m-2">
        <div class="col-lg-9">
            <div class="px-2 mb-3"><h1>Forms</h1></div>
            <div class="card">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-pills nav-fill mb-3" id="nav-tab" role="tablist">
                          <button class="nav-link active" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-active" type="button" role="tab" aria-controls="nav-active" aria-selected="true">Active</button>
                          <button class="nav-link" id="nav-done-tab" data-bs-toggle="tab" data-bs-target="#nav-done" type="button" role="tab" aria-controls="nav-done" aria-selected="false">Done</button>
                          {{-- <button class="nav-link" id="nav-archived-tab" data-bs-toggle="tab" data-bs-target="#nav-archived" type="button" role="tab" aria-controls="nav-archived" aria-selected="false">Archived</button> --}}
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-active" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="list-group">
                                @forelse($forms as $form)
                                {{-- Validasi Deadline --}}
                                    @if (date('Y-m-d H:i:s', time()) <= $form->deadline)
                                    <a class="list-group-item list-group-item-action {{ $form->has_filled_form ? 'disabled' : '' }}" href="{{ route('form', ['id'=>$form->id]) }}">
                                        <h6 class="h5">{{ $form->subject }}</h5>
                                            Deadline: {{ $form->deadline }}
                                            Period: {{$form->period}}
                                    </a>
                                    @endif
                                @empty
                                    No forms
                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-done" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="list-group">
                                @forelse($forms as $form)
                                {{-- Validasi Deadline --}}
                                    @if (date('Y-m-d H:i:s', time()) > $form->deadline)
                                    <a class="list-group-item list-group-item-action disabled" href="{{ route('form', ['id'=>$form->id]) }}">
                                        <h6 class="h5">{{ $form->subject }}</h5>
                                            Deadline: {{ $form->deadline }}
                                            Period: {{$form->period}}
                                    </a>
                                    @endif
                                @empty
                                    No forms
                                @endforelse
                            </div>
                        </div>
                        {{-- <div class="tab-pane fade" id="nav-archived" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="list-group">
                                @forelse($forms as $form)
                                    @if (period not current periodnow)
                                    <a class="list-group-item list-group-item-action" href="{{ route('form', ['id'=>$form->id]) }}">
                                        <h6 class="h5">{{ $form->subject }}</h5>
                                            Deadline: {{ $form->deadline }}
                                            Period: {{$form->period}}
                                    </a>
                                    @endif
                                @empty
                                    No forms
                                @endforelse
                            </div>
                        </div> --}}
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
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Complaint Ticket</h5>
                                    </div>
                                    {{-- <form action="API URL" method="POST"> --}}
                                    <form action="{{route('api.complaint.insert')}}" method="POST" id="complaintForm">
                                        @csrf
                                        <div class="modal-body row m-0 gy-2">
                                            <div>
                                                <label for="complaintTitle">Title:</label>
                                                <input type="text" class="form-control" placeholder="Insert title here"
                                                    name="title" id="complaintTitle" />
                                            </div>
                                            <label for="selectCourses">Select Courses:</label>
                                            <div>
                                                <select class="form-select" name="subject_id">
                                                    @forelse ($lecturerSubjects as $lecturerSubject)
                                                    <option selected value="{{$lecturerSubject->subject->id}}">{{$lecturerSubject->subject->id}} - {{$lecturerSubject->subject->subject}}</option>
                                                    @empty
                                                    <option selected>No Course Available
                                                    </option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div>
                                                <label for="complaintMessage">Message:</label>
                                                <textarea class="form-control" placeholder="Insert message here"
                                                    name="content" id="complaintTitle" rows="8" style="resize: none;"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" form="complaintForm">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (strcmp(explode('_', Cookie::get('user_auth'))[1], 'SCC') == 0)
                    
                <div class="col m-0 mb-2">
                    <div class="mb-1">Create Form</div>
                    <div class="card p-0">
                        <button type="button" class="card-body btn btn-primary text-white" id="ticket-btn"
                            data-bs-toggle="modal" data-bs-target="#formcreateModal">
                            New review form
                        </button>
                        <div class="modal fade" id="formcreateModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New form</h5>
                                    </div>
                                    {{-- <form action="API URL" method="POST"> --}}
                                    <form action="{{route('api.form.create')}}" method="POST" id="formcreateForm">
                                        @csrf
                                        <div class="modal-body row m-0 g-2">
                                            {{-- <input type="hidden" value="SCC ID HERE"> --}}
                                            <input type="hidden" value="">
                                            <div>
                                                <label for="complaintMessage">Period:</label>
                                                <input type="text" class="form-control" name="period"
                                                    placeholder="Insert period here (example: 221)">
                                            </div>
                                            <div>
                                                <label for="formDeadline">Deadline:</label>
                                                <input type="date" class="form-control" name="deadline">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" form="formcreateForm">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>


@endsection
