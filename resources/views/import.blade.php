@extends('layouts.app')
@section('content')
    <div class="container form-group my-4">
        @if (isset($res))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data updated successfully.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="post" action="{{route('import.upload')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Choose a file</label>
                <input type="file" class="form-control" id="file" name="file" aria-describedby="fileHelp" required accept=".xlsx,.xls">
                <div id="fileHelp" class="form-text">Upload excel-file for import data. File must have .xls or .xlsx extension</div>
            </div>
            <button type="submit" class="btn btn-primary">Import</button>
        </form>
    </div>
@endsection
