<!-- resources/views/webinars/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Webinar</h2>
        <form action="{{ route('webinars.update', $webinar->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $webinar->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $webinar->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="date_time">Date and Time</label>
                <input type="datetime-local" class="form-control" id="date_time" name="date_time" value="{{ $webinar->date_time }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Webinar</button>
            <a href="{{ route('webinars.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
