@extends('layouts.app')

@section('content')
<h1>Create an Event</h1>
<form action="{{ route('events.store') }}" method="post">
    @csrf
    <!-- Add other fields here -->
    <!-- ... -->
    <button type="submit">Create Event</button>
</form>
@endsection

