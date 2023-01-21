@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <h1 class="mt-4">Create a new Project!</h1>
    <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Add title"
                aria-describedby="titleHelper">
        </div>
        <div class="form-group d-flex flex-column py-3">
            <label for="image" class="form-label">Replace Cover Image</label>
            <input type="file" name="image" id="image" class="form-control" aria-describedby="imageHelper">
            <small id="imageHelper" class="text-muted">Replace the project image</small>
        </div>
        <div class="my-3">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Add description"></textarea>
        </div>

        <div class="mb-3">
            <label for="technologies" class="form-label">technologies</label>
            <select multiple class="form-select form-select-sm" name="technologies[]" id="technologies">
                <option value="" disabled>Select a technology</option>
                @forelse ($technologies as $technology)
                    @if ($errors->any())
                        <option value="{{ $technology->id }}"
                            {{ in_array($technology->id, old('technologies', [])) ? 'selected' : '' }}>
                            {{ $technology->name }}</option>
                    @else
                        <option value="{{ $technology->id }}">{{ $technology->name }}</option>
                    @endif
                @empty
                    <option value="" disabled>Sorry 😥 no technologies in the system</option>
                @endforelse
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
@endsection
