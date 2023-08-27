@extends('layouts.app')

@section('content')
<h1>Edit Event: {{ $event->title }}</h1>
<form action="{{ route('events.update', $event->id) }}" method="post">
    @csrf
    @method('PUT')
    
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $event->title }}" required>
    </div>
    
    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4" required>{{ $event->description }}</textarea>
    </div>
    
    <div>
        <label for="event_date">Event Date:</label>
        <input type="datetime-local" name="event_date" id="event_date" value="{{ $event->event_date->format('Y-m-d\TH:i') }}" required>
    </div>

    <div>
        <label for="format">Format:</label>
        <input type="text" name="format" id="format" value="{{ $event->format }}" required>
    </div>

    <button type="submit">Update Event</button>
</form>
@endsection

