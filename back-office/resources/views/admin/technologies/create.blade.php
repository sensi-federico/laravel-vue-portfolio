@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <h1 class="mt-4">Create a new Project!</h1>
    <form action="{{ route('admin.technologies.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Technology:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Add technology"
                aria-describedby="nameHelper">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
@endsection
