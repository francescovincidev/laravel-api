@extends('layouts.admin')

@section('content')
    <h2>Modifica il progetto {{ $project->title }}</h2>



    <form method="POST" action="{{ route('admin.projects.update', $project->slug) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title', $project->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type">Tipo</label>
            <select class="form-select @error('type_id') is-invalid @enderror" id="type" name="type_id">
                <option value=""></option>
                @foreach ($types as $type)
                    <option @selected($type->id == old('type_id', $project->type?->id)) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            @foreach ($technologys as $technology)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="technology_id" value="{{ $technology->id }}"
                        id="{{ $technology->name }}" @checked($technology->id)>
                    <label class="form-check-label" for="{{ $technology->name }}">
                        {{ $technology->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contentuto</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3" name="content">{{ old('content', $project->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Invia</button>
    </form>
@endsection
