@extends('layouts.app')
@section('title', "Upload GeoFiles")

@section('content')
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Uploaded Files') }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="uploads_table" class="table table-striped table-border compact">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Filename</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($files as $file)
                                <tr>
                                    <td>{{$file['title']}}</td>
                                    <td>{{$file['filename']}}</td>
                                    <td>
                                        <form id="delete-{{ $file['id'] }}" action="{{ route('profile.delete-geojson', ['id' => $file['id']]) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-warning rounded-sm fas fa-trash"></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                @error('my_file')
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                @enderror
                <div class="card-header">{{ __('Upload a GEO file') }}</div>
                <div class="card-body">
                    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">File Title</label>
                            <input type="title" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Enter title" value="" required>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <span class="btn btn-sm btn-warning btn-file">
                                    <span class="fileinput-new"><i class="fas fa-file pr-2"></i>Select file</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="my_file" multiple>
                                </span>
                                <span class="fileinput-filename"></span>
                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-warning float-right" type="submit">Upload</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        new DataTable('#uploads_table');

        // Handle delete alert
        $("[id^='delete-']").on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const form = this; // Reference to the form element

            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to delete this file",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#6777ef',
                cancelButtonColor: '#34395e',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
