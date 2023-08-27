@extends('layouts.app')

@section('content')
<h1>Register for {{ $event->title }}</h1>
<form action="{{ route('events.storeRegistration', $event->id) }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form>
@endsection
