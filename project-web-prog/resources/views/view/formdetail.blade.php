@extends('layout.master')

@section('title', 'Form Detail')

@section('content')

    <div class="row row-cols-1 p-3 m-2">
        {{-- @foreach($answers as $answer)
            - {{ implode(', ', $answer) }} <br>
            {{$answer}}
        @endforeach --}}
        <div class="col">
            <div class="px-2 mb-3"><h1>Form</h1></div>
            <div class="card">
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-xxl-3 mb-4">
                        {{-- @foreach($answers as $answer) --}}
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-left fw-bold">
                                    1. Apakah Bpk/Ibu Dosen sudah memiliki Minimal 1 Paper Scopus di Tahun ini?
                                </div>
                                <div class="card-body row row-cols-1 row-cols-md-2 row-cols-xxl-1">
                                    <div class="col mh-100">
                                        {{-- !!! Edit this line v !!! --}}
                                        {!! $answers[0]['chart']->render() !!}
                                    </div>
                                    <div class="col">
                                        <div class="accordion" id="accordion_q1">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    {{-- Edit this line v --}}
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_q1">
                                                    Other answers
                                                    </button>
                                                </h2>
                                                {{-- Edit this line v --}}
                                                <div id="collapse_q1" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion_q1">
                                                    <div class="accordion-body c-formdetail-accordion-scrollable">
                                                        <ul class="list-group">
                                                            {{-- !!! Edit this line v !!! --}}
                                                            @forelse ($answers[0]['responses'] as $response)
                                                                @if ($response != "Sudah" && $response != "Belum")
                                                                    <li class="list-group-item">{{ $response }}</li>
                                                                @endif
                                                            @empty
                                                                <li class="list-group-item">No data</li>
                                                            @endforelse
                                                            {{-- Edit this line v --}}
                                                            <li class="list-group-item text-primary" role="button" data-bs-toggle="modal" data-bs-target="#modal_q1" pointer="select">
                                                                More info
                                                            </li>
                                                            {{-- Edit this line v --}}
                                                            <div class="modal fade" id="modal_q1" tabindex="-1">
                                                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Answer details</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Lecturer ID</th>
                                                                                        <th>Lecturer Name</th>
                                                                                        <th>Response</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @forelse ($forms as $form)
                                                                                        <tr>
                                                                                            <td>{{ $form['lecturer_id'] }}</td>
                                                                                            <td>{{ $form['name'] }}</td>
                                                                                            {{-- !!! Edit this line v !!! --}}
                                                                                            <td>{{ $form['1'] }}</td>
                                                                                        </tr>
                                                                                    @empty
                                                                                        <tr>
                                                                                            <td>No data</td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                        </tr>                                                                                
                                                                                    @endforelse  
                                                                                </tbody>
                                                                        </table>
                                                                        </div>
                                                                            <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </ul>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-left fw-bold">
                                    2. Apakah Bpk/Ibu Dosen sudah memiliki Minimal 1 Paper Scopus di Tahun ini?
                                </div>
                                <div class="card-body row row-cols-1 row-cols-md-2 row-cols-xxl-1">
                                    <div class="col mh-100">
                                        {{-- !!! Edit this line v !!! --}}
                                        {!! $answers[1]['chart']->render() !!}
                                    </div>
                                    <div class="col">
                                        <div class="accordion" id="accordion_q2">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    {{-- Edit this line v --}}
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_q2">
                                                    Other answers
                                                    </button>
                                                </h2>
                                                {{-- Edit this line v --}}
                                                <div id="collapse_q2" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion_q2">
                                                    <div class="accordion-body c-formdetail-accordion-scrollable">
                                                        <ul class="list-group">
                                                            {{-- !!! Edit this line v !!! --}}
                                                            @forelse ($answers[1]['responses'] as $response)
                                                                @if ($response != "Sudah" && $response != "Belum")
                                                                    <li class="list-group-item">{{ $response }}</li>
                                                                @endif
                                                            @empty
                                                                <li class="list-group-item">No data</li>
                                                            @endforelse
                                                            {{-- Edit this line v --}}
                                                            <li class="list-group-item text-primary" role="button" data-bs-toggle="modal" data-bs-target="#modal_q2" pointer="select">
                                                                More info
                                                            </li>
                                                            {{-- Edit this line v --}}
                                                            <div class="modal fade" id="modal_q2" tabindex="-1">
                                                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Answer details</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Lecturer ID</th>
                                                                                        <th>Lecturer Name</th>
                                                                                        <th>Response</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @forelse ($forms as $form)
                                                                                        <tr>
                                                                                            <td>{{ $form['lecturer_id'] }}</td>
                                                                                            <td>{{ $form['name'] }}</td>
                                                                                            {{-- !!! Edit this line v !!! --}}
                                                                                            <td>{{ $form['2'] }}</td>
                                                                                        </tr>
                                                                                    @empty
                                                                                        <tr>
                                                                                            <td>No data</td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                        </tr>                                                                                
                                                                                    @endforelse  
                                                                                </tbody>
                                                                        </table>
                                                                        </div>
                                                                            <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </ul>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-header text-left fw-bold">
                                    3. Apakah Bpk/Ibu Dosen sudah memiliki Minimal 1 Paper Scopus di Tahun ini?
                                </div>
                                <div class="card-body row row-cols-1 row-cols-md-2 row-cols-xxl-1">
                                    <div class="col mh-100">
                                        {{-- !!! Edit this line v !!! --}}
                                        {!! $answers[2]['chart']->render() !!}
                                    </div>
                                    <div class="col">
                                        <div class="accordion" id="accordion_q3">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    {{-- Edit this line v --}}
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_q3">
                                                    Other answers
                                                    </button>
                                                </h2>
                                                {{-- Edit this line v --}}
                                                <div id="collapse_q3" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion_q3">
                                                    <div class="accordion-body c-formdetail-accordion-scrollable">
                                                        <ul class="list-group">
                                                            {{-- !!! Edit this line v !!! --}}
                                                            @forelse ($answers[2]['responses'] as $response)
                                                                @if ($response != "Sudah" && $response != "Belum")
                                                                    <li class="list-group-item">{{ $response }}</li>
                                                                @endif
                                                            @empty
                                                                <li class="list-group-item">No data</li>
                                                            @endforelse
                                                            {{-- Edit this line v --}}
                                                            <li class="list-group-item text-primary" role="button" data-bs-toggle="modal" data-bs-target="#modal_q3" pointer="select">
                                                                More info
                                                            </li>
                                                            {{-- Edit this line v --}}
                                                            <div class="modal fade" id="modal_q3" tabindex="-1">
                                                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Answer details</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Lecturer ID</th>
                                                                                        <th>Lecturer Name</th>
                                                                                        <th>Response</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @forelse ($forms as $form)
                                                                                        <tr>
                                                                                            <td>{{ $form['lecturer_id'] }}</td>
                                                                                            <td>{{ $form['name'] }}</td>
                                                                                            {{-- !!! Edit this line v !!! --}}
                                                                                            <td>{{ $form['3'] }}</td>
                                                                                        </tr>
                                                                                    @empty
                                                                                        <tr>
                                                                                            <td>No data</td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                        </tr>                                                                                
                                                                                    @endforelse  
                                                                                </tbody>
                                                                        </table>
                                                                        </div>
                                                                            <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </ul>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        {{-- @endforeach --}}
                    </div>
                    <div class="row row-cols-1 row-cols-lg-2 gy-4">
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-left fw-bold">
                                    4. Bagaimana Content pembelajaran secara general?
                                </div>
                                <div class="card-body">
                                    <div class="card-body row row-cols-1 row-cols-md-2">
                                        <div class="col mh-100">
                                            {{-- !!! Edit this line v !!! --}}
                                            {!! $answers[3]['chart']->render() !!}
                                        </div>
                                        <div class="col">
                                            <div class="fw-bold mb-3">
                                                5. Masukan terhadap Content secara general
                                            </div>
                                            <div class="accordion" id="accordion_q4">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        {{-- Edit this line v --}}
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_q4">
                                                            Responses
                                                        </button>
                                                    </h2>
                                                    {{-- Edit this line v --}}
                                                    <div id="collapse_q4" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion_q4">
                                                        <div class="accordion-body c-formdetail-accordion-scrollable">
                                                            <ul class="list-group">
                                                                {{-- !!! Edit this line v !!! --}}
                                                                @forelse ($answers[3]['responses'] as $response)
                                                                    @if ($response != "Sudah" && $response != "Belum")
                                                                        <li class="list-group-item">{{ $response }}</li>
                                                                    @endif
                                                                @empty
                                                                    <li class="list-group-item">No data</li>
                                                                @endforelse
                                                                {{-- Edit this line v --}}
                                                                <li class="list-group-item text-primary" role="button" data-bs-toggle="modal" data-bs-target="#modal_q4" pointer="select">
                                                                    More info
                                                                </li>
                                                                {{-- Edit this line v --}}
                                                                <div class="modal fade" id="modal_q4" tabindex="-1">
                                                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Answer details</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Lecturer ID</th>
                                                                                            <th>Lecturer Name</th>
                                                                                            <th>Response</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @forelse ($forms as $form)
                                                                                            <tr>
                                                                                                <td>{{ $form['lecturer_id'] }}</td>
                                                                                                <td>{{ $form['name'] }}</td>
                                                                                                {{-- !!! Edit this line v !!! --}}
                                                                                                <td>{{ $form['5'] }}</td>
                                                                                            </tr>
                                                                                        @empty
                                                                                            <tr>
                                                                                                <td>No data</td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                            </tr>                                                                                
                                                                                        @endforelse  
                                                                                    </tbody>
                                                                            </table>
                                                                            </div>
                                                                                <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </ul>                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-left fw-bold">
                                    6. Bagaimana Content pembelajaran secara general?
                                </div>
                                <div class="card-body">
                                    <div class="card-body row row-cols-1 row-cols-md-2">
                                        <div class="col mh-100">
                                            {{-- !!! Edit this line v !!! --}}
                                            {!! $answers[5]['chart']->render() !!}
                                        </div>
                                        <div class="col">
                                            <div class="fw-bold mb-3">
                                                7. Masukan terhadap Content secara general
                                            </div>
                                            <div class="accordion" id="accordion_q4">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        {{-- Edit this line v --}}
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_q6">
                                                            Responses
                                                        </button>
                                                    </h2>
                                                    {{-- Edit this line v --}}
                                                    <div id="collapse_q6" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion_q6">
                                                        <div class="accordion-body c-formdetail-accordion-scrollable">
                                                            <ul class="list-group">
                                                                {{-- !!! Edit this line v !!! --}}
                                                                @forelse ($answers[5]['responses'] as $response)
                                                                    @if ($response != "Sudah" && $response != "Belum")
                                                                        <li class="list-group-item">{{ $response }}</li>
                                                                    @endif
                                                                @empty
                                                                    <li class="list-group-item">No data</li>
                                                                @endforelse
                                                                {{-- Edit this line v --}}
                                                                <li class="list-group-item text-primary" role="button" data-bs-toggle="modal" data-bs-target="#modal_q6" pointer="select">
                                                                    More info
                                                                </li>
                                                                {{-- Edit this line v --}}
                                                                <div class="modal fade" id="modal_q6" tabindex="-1">
                                                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Answer details</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Lecturer ID</th>
                                                                                            <th>Lecturer Name</th>
                                                                                            <th>Response</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @forelse ($forms as $form)
                                                                                            <tr>
                                                                                                <td>{{ $form['lecturer_id'] }}</td>
                                                                                                <td>{{ $form['name'] }}</td>
                                                                                                {{-- !!! Edit this line v !!! --}}
                                                                                                <td>{{ $form['7'] }}</td>
                                                                                            </tr>
                                                                                        @empty
                                                                                            <tr>
                                                                                                <td>No data</td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                            </tr>                                                                                
                                                                                        @endforelse  
                                                                                    </tbody>
                                                                            </table>
                                                                            </div>
                                                                                <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </ul>                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-header text-left fw-bold">
                                    8. Bagaimana Content pembelajaran secara general?
                                </div>
                                <div class="card-body">
                                    <div class="card-body row row-cols-1 row-cols-md-2">
                                        <div class="col mh-100">
                                            {{-- !!! Edit this line v !!! --}}
                                            {!! $answers[7]['chart']->render() !!}
                                        </div>
                                        <div class="col">
                                            <div class="fw-bold mb-3">
                                                9. Masukan terhadap Content secara general
                                            </div>
                                            <div class="accordion" id="accordion_q8">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        {{-- Edit this line v --}}
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_q8">
                                                            Responses
                                                        </button>
                                                    </h2>
                                                    {{-- Edit this line v --}}
                                                    <div id="collapse_q8" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion_q8">
                                                        <div class="accordion-body c-formdetail-accordion-scrollable">
                                                            <ul class="list-group">
                                                                {{-- !!! Edit this line v !!! --}}
                                                                @forelse ($answers[7]['responses'] as $response)
                                                                    @if ($response != "Sudah" && $response != "Belum")
                                                                        <li class="list-group-item">{{ $response }}</li>
                                                                    @endif
                                                                @empty
                                                                    <li class="list-group-item">No data</li>
                                                                @endforelse
                                                                {{-- Edit this line v --}}
                                                                <li class="list-group-item text-primary" role="button" data-bs-toggle="modal" data-bs-target="#modal_q8" pointer="select">
                                                                    More info
                                                                </li>
                                                                {{-- Edit this line v --}}
                                                                <div class="modal fade" id="modal_q8" tabindex="-1">
                                                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Answer details</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Lecturer ID</th>
                                                                                            <th>Lecturer Name</th>
                                                                                            <th>Response</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @forelse ($forms as $form)
                                                                                            <tr>
                                                                                                <td>{{ $form['lecturer_id'] }}</td>
                                                                                                <td>{{ $form['name'] }}</td>
                                                                                                {{-- !!! Edit this line v !!! --}}
                                                                                                <td>{{ $form['9'] }}</td>
                                                                                            </tr>
                                                                                        @empty
                                                                                            <tr>
                                                                                                <td>No data</td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                            </tr>                                                                                
                                                                                        @endforelse  
                                                                                    </tbody>
                                                                            </table>
                                                                            </div>
                                                                                <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </ul>                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-left fw-bold">
                                    10. Bagaimana Content pembelajaran secara general?
                                </div>
                                <div class="card-body">
                                    <div class="card-body row row-cols-1 row-cols-md-2">
                                        <div class="col mh-100">
                                            {{-- !!! Edit this line v !!! --}}
                                            {!! $answers[9]['chart']->render() !!}
                                        </div>
                                        <div class="col">
                                            <div class="fw-bold mb-3">
                                                11. Masukan terhadap Content secara general
                                            </div>
                                            <div class="accordion" id="accordion_q10">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        {{-- Edit this line v --}}
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_q10">
                                                            Responses
                                                        </button>
                                                    </h2>
                                                    {{-- Edit this line v --}}
                                                    <div id="collapse_q10" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion_q10">
                                                        <div class="accordion-body c-formdetail-accordion-scrollable">
                                                            <ul class="list-group">
                                                                {{-- !!! Edit this line v !!! --}}
                                                                @forelse ($answers[9]['responses'] as $response)
                                                                    @if ($response != "Sudah" && $response != "Belum")
                                                                        <li class="list-group-item">{{ $response }}</li>
                                                                    @endif
                                                                @empty
                                                                    <li class="list-group-item">No data</li>
                                                                @endforelse
                                                                {{-- Edit this line v --}}
                                                                <li class="list-group-item text-primary" role="button" data-bs-toggle="modal" data-bs-target="#modal_q10" pointer="select">
                                                                    More info
                                                                </li>
                                                                {{-- Edit this line v --}}
                                                                <div class="modal fade" id="modal_q10" tabindex="-1">
                                                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Answer details</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Lecturer ID</th>
                                                                                            <th>Lecturer Name</th>
                                                                                            <th>Response</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @forelse ($forms as $form)
                                                                                            <tr>
                                                                                                <td>{{ $form['lecturer_id'] }}</td>
                                                                                                <td>{{ $form['name'] }}</td>
                                                                                                {{-- !!! Edit this line v !!! --}}
                                                                                                <td>{{ $form['11'] }}</td>
                                                                                            </tr>
                                                                                        @empty
                                                                                            <tr>
                                                                                                <td>No data</td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                            </tr>                                                                                
                                                                                        @endforelse  
                                                                                    </tbody>
                                                                            </table>
                                                                            </div>
                                                                                <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </ul>                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-header text-left fw-bold">
                                    12. Bagaimana Content pembelajaran secara general?
                                </div>
                                <div class="card-body">
                                    <div class="card-body row row-cols-1 row-cols-md-2">
                                        <div class="col mh-100">
                                            {{-- !!! Edit this line v !!! --}}
                                            {!! $answers[11]['chart']->render() !!}
                                        </div>
                                        <div class="col">
                                            <div class="fw-bold mb-3">
                                                13. Masukan terhadap Content secara general
                                            </div>
                                            <div class="accordion" id="accordion_q12">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        {{-- Edit this line v --}}
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_q12">
                                                            Responses
                                                        </button>
                                                    </h2>
                                                    {{-- Edit this line v --}}
                                                    <div id="collapse_q12" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion_q12">
                                                        <div class="accordion-body c-formdetail-accordion-scrollable">
                                                            <ul class="list-group">
                                                                {{-- !!! Edit this line v !!! --}}
                                                                @forelse ($answers[11]['responses'] as $response)
                                                                    @if ($response != "Sudah" && $response != "Belum")
                                                                        <li class="list-group-item">{{ $response }}</li>
                                                                    @endif
                                                                @empty
                                                                    <li class="list-group-item">No data</li>
                                                                @endforelse
                                                                {{-- Edit this line v --}}
                                                                <li class="list-group-item text-primary" role="button" data-bs-toggle="modal" data-bs-target="#modal_q12" pointer="select">
                                                                    More info
                                                                </li>
                                                                {{-- Edit this line v --}}
                                                                <div class="modal fade" id="modal_q12" tabindex="-1">
                                                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Answer details</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Lecturer ID</th>
                                                                                            <th>Lecturer Name</th>
                                                                                            <th>Response</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @forelse ($forms as $form)
                                                                                            <tr>
                                                                                                <td>{{ $form['lecturer_id'] }}</td>
                                                                                                <td>{{ $form['name'] }}</td>
                                                                                                {{-- !!! Edit this line v !!! --}}
                                                                                                <td>{{ $form['13'] }}</td>
                                                                                            </tr>
                                                                                        @empty
                                                                                            <tr>
                                                                                                <td>No data</td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                            </tr>                                                                                
                                                                                        @endforelse  
                                                                                    </tbody>
                                                                            </table>
                                                                            </div>
                                                                                <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </ul>                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-left fw-bold">
                                    14. Bagaimana Content pembelajaran secara general?
                                </div>
                                <div class="card-body">
                                    <div class="card-body row row-cols-1 row-cols-md-2">
                                        <div class="col mh-100">
                                            {{-- !!! Edit this line v !!! --}}
                                            {!! $answers[13]['chart']->render() !!}
                                        </div>
                                        <div class="col">
                                            <div class="fw-bold mb-3">
                                                15. Masukan terhadap Content secara general
                                            </div>
                                            <div class="accordion" id="accordion_q14">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        {{-- Edit this line v --}}
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_q14">
                                                            Responses
                                                        </button>
                                                    </h2>
                                                    {{-- Edit this line v --}}
                                                    <div id="collapse_q14" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion_q14">
                                                        <div class="accordion-body c-formdetail-accordion-scrollable">
                                                            <ul class="list-group">
                                                                {{-- !!! Edit this line v !!! --}}
                                                                @forelse ($answers[13]['responses'] as $response)
                                                                    @if ($response != "Sudah" && $response != "Belum")
                                                                        <li class="list-group-item">{{ $response }}</li>
                                                                    @endif
                                                                @empty
                                                                    <li class="list-group-item">No data</li>
                                                                @endforelse
                                                                {{-- Edit this line v --}}
                                                                <li class="list-group-item text-primary" role="button" data-bs-toggle="modal" data-bs-target="#modal_q14" pointer="select">
                                                                    More info
                                                                </li>
                                                                {{-- Edit this line v --}}
                                                                <div class="modal fade" id="modal_q14" tabindex="-1">
                                                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Answer details</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Lecturer ID</th>
                                                                                            <th>Lecturer Name</th>
                                                                                            <th>Response</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @forelse ($forms as $form)
                                                                                            <tr>
                                                                                                <td>{{ $form['lecturer_id'] }}</td>
                                                                                                <td>{{ $form['name'] }}</td>
                                                                                                {{-- !!! Edit this line v !!! --}}
                                                                                                <td>{{ $form['15'] }}</td>
                                                                                            </tr>
                                                                                        @empty
                                                                                            <tr>
                                                                                                <td>No data</td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                            </tr>                                                                                
                                                                                        @endforelse  
                                                                                    </tbody>
                                                                            </table>
                                                                            </div>
                                                                                <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </ul>                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-header text-left fw-bold">
                                    16. Bagaimana Content pembelajaran secara general?
                                </div>
                                <div class="card-body">
                                    <div class="card-body row row-cols-1 row-cols-md-2">
                                        <div class="col mh-100">
                                            {{-- !!! Edit this line v !!! --}}
                                            {!! $answers[15]['chart']->render() !!}
                                        </div>
                                        <div class="col">
                                            <div class="fw-bold mb-3">
                                                17. Masukan terhadap Content secara general
                                            </div>
                                            <div class="accordion" id="accordion_q16">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        {{-- Edit this line v --}}
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_q16">
                                                            Responses
                                                        </button>
                                                    </h2>
                                                    {{-- Edit this line v --}}
                                                    <div id="collapse_q16" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion_q16">
                                                        <div class="accordion-body c-formdetail-accordion-scrollable">
                                                            <ul class="list-group">
                                                                {{-- !!! Edit this line v !!! --}}
                                                                @forelse ($answers[15]['responses'] as $response)
                                                                    @if ($response != "Sudah" && $response != "Belum")
                                                                        <li class="list-group-item">{{ $response }}</li>
                                                                    @endif
                                                                @empty
                                                                    <li class="list-group-item">No data</li>
                                                                @endforelse
                                                                {{-- Edit this line v --}}
                                                                <li class="list-group-item text-primary" role="button" data-bs-toggle="modal" data-bs-target="#modal_q16" pointer="select">
                                                                    More info
                                                                </li>
                                                                {{-- Edit this line v --}}
                                                                <div class="modal fade" id="modal_q16" tabindex="-1">
                                                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Answer details</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Lecturer ID</th>
                                                                                            <th>Lecturer Name</th>
                                                                                            <th>Response</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @forelse ($forms as $form)
                                                                                            <tr>
                                                                                                <td>{{ $form['lecturer_id'] }}</td>
                                                                                                <td>{{ $form['name'] }}</td>
                                                                                                {{-- !!! Edit this line v !!! --}}
                                                                                                <td>{{ $form['17'] }}</td>
                                                                                            </tr>
                                                                                        @empty
                                                                                            <tr>
                                                                                                <td>No data</td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                            </tr>                                                                                
                                                                                        @endforelse  
                                                                                    </tbody>
                                                                            </table>
                                                                            </div>
                                                                                <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </ul>                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-left fw-bold">
                                    18. Bagaimana Content pembelajaran secara general?
                                </div>
                                <div class="card-body">
                                    <div class="card-body row row-cols-1 row-cols-md-2">
                                        <div class="col mh-100">
                                            {{-- !!! Edit this line v !!! --}}
                                            {!! $answers[17]['chart']->render() !!}
                                        </div>
                                        <div class="col">
                                            <div class="fw-bold mb-3">
                                                19. Masukan terhadap Content secara general
                                            </div>
                                            <div class="accordion" id="accordion_q18">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        {{-- Edit this line v --}}
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_q18">
                                                            Responses
                                                        </button>
                                                    </h2>
                                                    {{-- Edit this line v --}}
                                                    <div id="collapse_q18" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion_q18">
                                                        <div class="accordion-body c-formdetail-accordion-scrollable">
                                                            <ul class="list-group">
                                                                {{-- !!! Edit this line v !!! --}}
                                                                @forelse ($answers[17]['responses'] as $response)
                                                                    @if ($response != "Sudah" && $response != "Belum")
                                                                        <li class="list-group-item">{{ $response }}</li>
                                                                    @endif
                                                                @empty
                                                                    <li class="list-group-item">No data</li>
                                                                @endforelse
                                                                {{-- Edit this line v --}}
                                                                <li class="list-group-item text-primary" role="button" data-bs-toggle="modal" data-bs-target="#modal_q18" pointer="select">
                                                                    More info
                                                                </li>
                                                                {{-- Edit this line v --}}
                                                                <div class="modal fade" id="modal_q18" tabindex="-1">
                                                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Answer details</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Lecturer ID</th>
                                                                                            <th>Lecturer Name</th>
                                                                                            <th>Response</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @forelse ($forms as $form)
                                                                                            <tr>
                                                                                                <td>{{ $form['lecturer_id'] }}</td>
                                                                                                <td>{{ $form['name'] }}</td>
                                                                                                {{-- !!! Edit this line v !!! --}}
                                                                                                <td>{{ $form['19'] }}</td>
                                                                                            </tr>
                                                                                        @empty
                                                                                            <tr>
                                                                                                <td>No data</td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                            </tr>                                                                                
                                                                                        @endforelse  
                                                                                    </tbody>
                                                                            </table>
                                                                            </div>
                                                                                <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </ul>                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-header text-left fw-bold">
                                    20. Bagaimana Content pembelajaran secara general?
                                </div>
                                <div class="card-body">
                                    <div class="card-body row row-cols-1 row-cols-md-2">
                                        <div class="col mh-100">
                                            {{-- !!! Edit this line v !!! --}}
                                            {!! $answers[19]['chart']->render() !!}
                                        </div>
                                        <div class="col">
                                            <div class="fw-bold mb-3">
                                                21. Masukan terhadap Content secara general
                                            </div>
                                            <div class="accordion" id="accordion_q20">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        {{-- Edit this line v --}}
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_q20">
                                                            Responses
                                                        </button>
                                                    </h2>
                                                    {{-- Edit this line v --}}
                                                    <div id="collapse_q20" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion_q20">
                                                        <div class="accordion-body c-formdetail-accordion-scrollable">
                                                            <ul class="list-group">
                                                                {{-- !!! Edit this line v !!! --}}
                                                                @forelse ($answers[19]['responses'] as $response)
                                                                    @if ($response != "Sudah" && $response != "Belum")
                                                                        <li class="list-group-item">{{ $response }}</li>
                                                                    @endif
                                                                @empty
                                                                    <li class="list-group-item">No data</li>
                                                                @endforelse
                                                                {{-- Edit this line v --}}
                                                                <li class="list-group-item text-primary" role="button" data-bs-toggle="modal" data-bs-target="#modal_q20" pointer="select">
                                                                    More info
                                                                </li>
                                                                {{-- Edit this line v --}}
                                                                <div class="modal fade" id="modal_q20" tabindex="-1">
                                                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Answer details</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Lecturer ID</th>
                                                                                            <th>Lecturer Name</th>
                                                                                            <th>Response</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @forelse ($forms as $form)
                                                                                            <tr>
                                                                                                <td>{{ $form['lecturer_id'] }}</td>
                                                                                                <td>{{ $form['name'] }}</td>
                                                                                                {{-- !!! Edit this line v !!! --}}
                                                                                                <td>{{ $form['21'] }}</td>
                                                                                            </tr>
                                                                                        @empty
                                                                                            <tr>
                                                                                                <td>No data</td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                            </tr>                                                                                
                                                                                        @endforelse  
                                                                                    </tbody>
                                                                            </table>
                                                                            </div>
                                                                                <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </ul>                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-header text-left fw-bold">
                                    22. Bagaimana Content pembelajaran secara general?
                                </div>
                                <div class="card-body">
                                    <div class="card-body row row-cols-1 row-cols-md-2">
                                        <div class="col mh-100">
                                            {{-- !!! Edit this line v !!! --}}
                                            {!! $answers[21]['chart']->render() !!}
                                        </div>
                                        <div class="col">
                                            <div class="fw-bold mb-3">
                                                23. Masukan terhadap Content secara general
                                            </div>
                                            <div class="accordion" id="accordion_q22">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        {{-- Edit this line v --}}
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_q22">
                                                            Responses
                                                        </button>
                                                    </h2>
                                                    {{-- Edit this line v --}}
                                                    <div id="collapse_q22" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion_q22">
                                                        <div class="accordion-body c-formdetail-accordion-scrollable">
                                                            <ul class="list-group">
                                                                {{-- !!! Edit this line v !!! --}}
                                                                @forelse ($answers[21]['responses'] as $response)
                                                                    @if ($response != "Sudah" && $response != "Belum")
                                                                        <li class="list-group-item">{{ $response }}</li>
                                                                    @endif
                                                                @empty
                                                                    <li class="list-group-item">No data</li>
                                                                @endforelse
                                                                {{-- Edit this line v --}}
                                                                <li class="list-group-item text-primary" role="button" data-bs-toggle="modal" data-bs-target="#modal_q22" pointer="select">
                                                                    More info
                                                                </li>
                                                                {{-- Edit this line v --}}
                                                                <div class="modal fade" id="modal_q22" tabindex="-1">
                                                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Answer details</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Lecturer ID</th>
                                                                                            <th>Lecturer Name</th>
                                                                                            <th>Response</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @forelse ($forms as $form)
                                                                                            <tr>
                                                                                                <td>{{ $form['lecturer_id'] }}</td>
                                                                                                <td>{{ $form['name'] }}</td>
                                                                                                {{-- !!! Edit this line v !!! --}}
                                                                                                <td>{{ $form['23'] }}</td>
                                                                                            </tr>
                                                                                        @empty
                                                                                            <tr>
                                                                                                <td>No data</td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                            </tr>                                                                                
                                                                                        @endforelse  
                                                                                    </tbody>
                                                                            </table>
                                                                            </div>
                                                                                <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </ul>                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-header text-left fw-bold">
                                    24. Bagaimana Content pembelajaran secara general?
                                </div>
                                <div class="card-body">
                                    <div class="card-body row row-cols-1 row-cols-md-2">
                                        <div class="col mh-100">
                                            {{-- !!! Edit this line v !!! --}}
                                            {!! $answers[23]['chart']->render() !!}
                                        </div>
                                        <div class="col">
                                            <div class="fw-bold mb-3">
                                                25. Masukan terhadap Content secara general
                                            </div>
                                            <div class="accordion" id="accordion_q24">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        {{-- Edit this line v --}}
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_q24">
                                                            Responses
                                                        </button>
                                                    </h2>
                                                    {{-- Edit this line v --}}
                                                    <div id="collapse_q24" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion_q24">
                                                        <div class="accordion-body c-formdetail-accordion-scrollable">
                                                            <ul class="list-group">
                                                                {{-- !!! Edit this line v !!! --}}
                                                                @forelse ($answers[23]['responses'] as $response)
                                                                    @if ($response != "Sudah" && $response != "Belum")
                                                                        <li class="list-group-item">{{ $response }}</li>
                                                                    @endif
                                                                @empty
                                                                    <li class="list-group-item">No data</li>
                                                                @endforelse
                                                                {{-- Edit this line v --}}
                                                                <li class="list-group-item text-primary" role="button" data-bs-toggle="modal" data-bs-target="#modal_q24" pointer="select">
                                                                    More info
                                                                </li>
                                                                {{-- Edit this line v --}}
                                                                <div class="modal fade" id="modal_q24" tabindex="-1">
                                                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Answer details</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Lecturer ID</th>
                                                                                            <th>Lecturer Name</th>
                                                                                            <th>Response</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @forelse ($forms as $form)
                                                                                            <tr>
                                                                                                <td>{{ $form['lecturer_id'] }}</td>
                                                                                                <td>{{ $form['name'] }}</td>
                                                                                                {{-- !!! Edit this line v !!! --}}
                                                                                                <td>{{ $form['25'] }}</td>
                                                                                            </tr>
                                                                                        @empty
                                                                                            <tr>
                                                                                                <td>No data</td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                            </tr>                                                                                
                                                                                        @endforelse  
                                                                                    </tbody>
                                                                            </table>
                                                                            </div>
                                                                                <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </ul>                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card" style="height: 300px">
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha256-t9UJPrESBeG2ojKTIcFLPGF7nHi2vEc7f5A2KpH/UBU=" crossorigin="anonymous"></script>

@endsection