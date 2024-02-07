@extends('layouts.admin')

@section('content')
    <div class="container d-flex flex-column align-items-center">
        <div class="header-show d-flex align-items-center gap-2">
            <h2>{{ $project->title }}</h2>
            <span class="card-subtitle mb-2 text-body-secondary">{{ $project->visibility }}</span>
        </div>
        <div class="cont-info d-flex gap-5">
            <span>{{ $project->main_language }}</span>
            <span>{{ $project->last_updated }}</span>
        </div>

        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">Modifica</a>
    </div>
@endsection
