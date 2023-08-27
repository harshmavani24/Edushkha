<!-- resources/views/webinars/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Webinars</h2>
        <a href="{{ route('webinars.create') }}" class="btn btn-primary">Create Webinar</a>
        <hr>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($webinars->isEmpty())
            <p>No webinars available.</p>
        @else
            @foreach ($webinars as $webinar)
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $webinar->title }}</h3>
                        <p class="card-text">{{ $webinar->description }}</p>
                        <p class="card-text">Date and Time: {{ $webinar->date_time }}</p>
                        <a href="{{ route('webinars.show', $webinar->id) }}" class="btn btn-primary">View Details</a>
                        <a href="{{ route('webinars.edit', $webinar->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('webinars.destroy', $webinar->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this webinar?')">Delete</button>
                        </form>
                    </div>
                </div>
                <br>
            @endforeach
        @endif
    </div>
@endsection
