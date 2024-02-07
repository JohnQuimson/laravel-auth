@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        {{-- <a href="{{ route('comics.create') }}" class="btn btn-warning text-white">Add Comic</a> --}}
        <div class="row py-5">
            @foreach ($projects as $project)
                {{-- card --}}
                <div class="col-12 col-md-6 col-xl-4 d-flex justify-content-center g-5">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $project->visibility }}</h6>
                            <div class="cont-info d-flex justify-content-around">
                                <span>{{ $project->main_language }}</span>
                                <span>{{ $project->last_updated }}</span>
                            </div>
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-warning">Show</a>
                            <a href="#" class="btn btn-danger">delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
