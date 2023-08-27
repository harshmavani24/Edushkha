@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Conference</h2>
        
        <form method="POST" action="{{ route('conferences.create') }}">
            @csrf
            <!-- Conference Name -->
            <div class="form-group">
                <label for="conference_name">Conference Name</label>
                <input type="text" name="conference_name" class="form-control" id="conference_name" required>
            </div>

            <!-- Conference Date and Time -->
            <div class="form-group">
                <label for="conference_datetime">Date and Time</label>
                <input type="datetime-local" name="conference_datetime" class="form-control" id="conference_datetime" required>
            </div>

            <!-- Conference Description -->
            <div class="form-group">
                <label for="conference_description">Conference Description</label>
                <textarea name="conference_description" class="form-control" id="conference_description" rows="4" required></textarea>
            </div>

            <!-- Add more form fields as needed -->

            <button type="submit" class="btn btn-primary">Create Conference</button>
        </form>
    </div>
@endsection
