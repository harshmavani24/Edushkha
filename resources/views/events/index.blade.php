@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mt-4">Upcoming Events</h1>
    <div class="row justify-content-center">
        @foreach($events as $event)
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $event->title }}</h2>
                        <p class="card-text">{{ $event->description }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('events.register', $event->id) }}" class="btn btn-primary">Register</a>
                            <a href="{{ route('analytics.show', $event->id) }}" class="btn btn-secondary">View Analytics</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
