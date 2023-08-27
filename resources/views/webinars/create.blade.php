<!-- resources/views/webinars/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Webinar</h2>
        <form action="{{ route('webinars.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required></textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="date_time">Date and Time:</label>
                <input type="datetime-local" name="date_time" id="date_time" class="form-control @error('date_time') is-invalid @enderror" required>
                @error('date_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('webinars.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
