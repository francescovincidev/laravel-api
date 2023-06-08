@extends('layouts.admin')

@section('content')
    <h1 class="text-center">{{ $project->title }}</h1>
    <div class="text-end">
        {{ $project->slug }}
    </div>
    <span>Tipo: {{ $project->type ? $project->type->name : 'unknown user' }}</span>
    <div class="mt-3">
        <h5>Tecnologie </h5>
        @forelse ($project->technologys as $technology)
            <span>{{ $technology->name }}{{ $loop->last ? '' : ',' }}</span>
        @empty
            <span>Nessuna teconlogia presente</span>
        @endforelse

    </div>
    <p class="mt-4">Contenuto: {{ $project->content }}</p>
@endsection
