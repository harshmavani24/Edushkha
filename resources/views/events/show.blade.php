@extends('layouts.app')

@section('content')
<h1>{{ $event->title }}</h1>
<p>{{ $event->description }}</p>
<p>Date: {{ $event->event_date }}</p>
<p>Format: {{ $event->format }}</p>

{{-- Academic Program and Campus Location assuming they're loaded with the event --}}
<p>Academic Program: {{ $event->academic_program->name ?? 'N/A' }}</p>
<p>Campus Location: {{ $event->campus_location->name ?? 'N/A' }}</p>

<form action="{{ route('events.destroy', $event->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure you want to delete this event?')">Delete Event</button>
</form>

<a href="{{ route('events.index') }}">Back to Events</a>
@endsection

