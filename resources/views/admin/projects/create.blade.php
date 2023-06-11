@extends('layouts.admin')

@section('content')
    <h2>Crea un nuovo progetto</h2>



    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <select class="form-select @error('type_id') is-invalid @enderror" id="type" name="type_id">
                <option value=""></option>
                @foreach ($types as $type)
                    <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
                @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </select>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Tecnologie</label>
            @foreach ($technologys as $technology)
                <div class="form-check">
                    <input class="form-check-input " type="checkbox" name="technologys[]" value="{{ $technology->id }}"
                        id="technology-{{ $technology->id }}" @checked(in_array($technology->id, old('technologys', [])))>
                    <label class="form-check-label" for="technology-{{ $technology->name }}">
                        {{ $technology->name }}
                    </label>
                </div>
            @endforeach
            @error('technologys')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contentuto</label>
            <textarea class="form-control  @error('content') is-invalid @enderror" id="content" rows="3" name="content">{{ old('content') }}</textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Invia</button>
    </form>
@endsection
