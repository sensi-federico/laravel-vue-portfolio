@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <h1 class="mt-4">Edit Project!</h1>
    <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Add title"
                aria-describedby="titleHelper" value="{{ old('title', $project->title) }}">
        </div>
        <div class="my-3">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="technologies" class="form-label">technologies</label>
            <select multiple class="form-select form-select-sm" name="technologies[]" id="technologies">
                <option value="" disabled>Select a technology</option>
                @forelse ($technologies as $technology)
                    @if ($errors->any())
                        <!-- Pagina con errori di validazione, deve usare old per verificare quale id di technology preselezionare -->
                        <option value="{{ $technology->id }}"
                            {{ in_array($technology->id, old('technologies', [])) ? 'selected' : '' }}>
                            {{ $technology->name }}</option>
                    @else
                        <!-- Pagina caricate per la prima volta: deve mostrarare i technology preseleziononati dal db -->
                        <option value="{{ $technology->id }}"
                            {{ $project->technologies->contains($technology->id) ? 'selected' : '' }}>
                            {{ $technology->name }}</option>
                    @endif
                @empty
                    <option value="" disabled>Sorry 😥 no technologies in the system</option>
                @endforelse

            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection
