@extends('layouts.admin')

@section('content')
    <main class="main-index">
        <div class="container text-center">
            {{-- add project --}}
            <a href="{{ route('admin.projects.create') }}" class="btn btn-success text-white mt-5">
                aggiungi progetto
                <i class="fa-solid fa-plus"></i>
            </a>
            {{-- Add project --}}
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
                                <div class="cont-btn d-flex justify-content-around">
                                    {{-- Show --}}
                                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-warning">Info</a>
                                    {{-- Delete --}}
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Cancella" class="btn btn-danger">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
