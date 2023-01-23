@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <h1 class="mt-4">Edit a Project!</h1>
    <form action="{{ route('admin.technologies.update', $technology->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">Technology:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $technology->name) }}"
                aria-describedby="nameHelper">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection
