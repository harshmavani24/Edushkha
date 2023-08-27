@extends('layouts.app')

@section('content')
<h1>Thank you for registering for {{ $event->title }}!</h1>
<p>We've sent a confirmation email to {{ $email }}. Please check your inbox!</p>
<a href="{{ route('events.index') }}" class="btn btn-primary">Back to events</a>
@endsection
