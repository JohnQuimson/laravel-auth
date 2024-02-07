@extends('layouts.admin')

@section('content')
    <div class="container">

        {{-- Validation --}}
        {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
        {{-- Validation --}}

        <form action="{{ route('comics.store') }}" method="POST">
            @csrf

            {{-- titolo --}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Titolo</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">

                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- CONTENITORE 1 --}}
            <div class="cont-1 d-flex justify-content-around">
                {{-- serie --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Series</label>
                    <input type="text" class="form-control @error('series') is-invalid @enderror" name="series" value="{{ old('series') }}">

                    @error('series')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- type --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">type</label>
                    <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}">

                    @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- CONTENITORE 2 --}}
            <div class="cont-2 d-flex justify-content-around">
                {{-- data --}}
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Sale date</label>
                    <input type="text" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date" value="{{ old('sale_date') }}">

                    @error('sale_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- prezzo --}}
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">

                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            {{-- immagine --}}
            <div class="mb-3">
                <label class="form-label">Immagine</label>
                <input type="text" name="thumb" class="form-control @error('thumb') is-invalid @enderror" value="{{ old('thumb') }}">

                @error('thumb')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- descrizione --}}
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Crea</button>
        </form>
        <div class="pt-5">
            <a href="{{ route('comics.index') }}">
                < torna alla lista</a>
        </div>
    </div>
@endsection
