@extends('layouts.admin')

@section('content')
    <div class="container">

        {{-- Validation --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- Validation --}}

        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf

            {{-- method --}}
            @method('PUT')

            {{-- titolo --}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Titolo</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}">
            </div>


            {{-- visibility --}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">visibility</label>
                <input type="text" class="form-control" name="visibility" value="{{ old('visibility', $project->visibility) }}">


            </div>

            {{-- last_updated --}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">last_updated</label>
                <input type="text" class="form-control" name="last_updated" value="{{ old('last_updated', $project->last_updated) }}">


            </div>


            {{-- main_language --}}
            <div class="mb-3">
                <label class="form-label">main_language</label>
                <input type="text" name="main_language" class="form-control" value="{{ old('main_language', $project->main_language) }}">


            </div>

            <button type="submit" class="btn btn-success">Conferma modifica</button>
        </form>
        <div class="pt-5">
            <a href="{{ route('admin.projects.index') }}">
                < torna alla lista</a>
        </div>
    </div>
@endsection
