<!-- resources/views/webinars/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Webinar Details</h2>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $webinar->title }}</h3>
                <p class="card-text">{{ $webinar->description }}</p>
                <p class="card-text">Date and Time: {{ $webinar->date_time }}</p>
                <a href="{{ route('webinars.edit', $webinar->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('webinars.destroy', $webinar->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this webinar?')">Delete</button>
                </form>
                <a href="{{ route('webinars.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
