@extends('layout.master')

@section('title', 'Manage Lecturers')

@section('content')
<div class="card bg-light">
    <div class="card-header bg-primary" style="margin-top: 50px">
        <br>
        <h4>Manage Lectures</h4>
        <br>
    </div>
    <form action="" method="POST" id="searchLecture">
        @csrf
        <div class="modal-body row m-0 gy-2">
            <label for="selectCourses">Select Period:</label>
            <div>
                <select class="form-select">
                    @forelse (Query Period)
                    <option selected value="{{}}">(Query Period)</option>
                    @empty
                    <option selected>No Period Available
                    </option>
                    @endforelse
                </select>
            </div>
            <label for="selectCourses">Select Rumpunan:</label>
            <div>
                <select class="form-select">
                    @forelse (Query Rumpunan)
                    <option selected value="{{}}">(Query Rumpunan)</option>
                    @empty
                    <option selected>No Rumpunan Available
                    </option>
                    @endforelse
                </select>
            </div class="modal-footer">
            <button type="submit" class="btn btn-primary" form="searchLecture">Search</button>
        </div>
    </form>
</div>
<div class ="table">
    <!--  -->
</div>
@endsection
