@extends('layouts.app')
@section('content')
    <div class="container form-group my-4">
        <form method="post" action="{{route('import.upload')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Choose a file</label>
                <input type="file" class="form-control" id="fileInput" aria-describedby="fileHelp" required accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                <div id="fileHelp" class="form-text">Upload excel-file for import data. File must have .xls or .xlsx extension</div>
            </div>
            <button type="submit" class="btn btn-primary">Import</button>
        </form>
    </div>
@endsection
