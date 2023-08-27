@extends('layouts.app')

@section('content')
<h1>Engagement Analytics: {{ $event->title }}</h1>

<p>Event ID: {{ $event->id }}</p>
<p>Total Registrations: {{ $event->registrations->count() }}</p>
<p>Total Attendance: {{ $event->registrations->where('attended', true)->count() }}</p>
<!-- Add more analytics as needed -->

<a href="{{ route('events.index') }}">Back to Events</a>
@endsection
