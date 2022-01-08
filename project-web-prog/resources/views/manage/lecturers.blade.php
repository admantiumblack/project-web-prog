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
                <label for="selectPeriod">Select Period:</label>
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
                <label for="selectRumpunan">Select Rumpunan:</label>
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
    <div class="card-body">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th class="col-2">CheckBox</th>
                    <th class="col-3">Nama Dosen</th>
                    <th class="col-3">Kode Dosen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" name="" value="">
                    </td>
                    <td>Sean Oswald Ramli</td>
                    <td>D6900</td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" value="">
                    </td>
                    <td>Roland</td>
                    <td>D0001</td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" value="">
                    </td>
                    <td>Samuel Yang</td>
                    <td>D0420</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
