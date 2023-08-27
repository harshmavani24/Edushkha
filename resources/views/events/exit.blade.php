@extends('layouts.app')

@section('content')
<h1>Edit Event: {{ $event->title }}</h1>
<form action="{{ route('events.update', $event->id) }}" method="post">
    @csrf
    @method('PUT')
    <!-- Add other fields here -->
    <!-- ... -->
    <button type="submit">Update Event</button>
</form>
@endsection


