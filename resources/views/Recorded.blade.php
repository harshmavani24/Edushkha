@extends('layouts.app')

@section('content')
<h1>Recorded Events</h1>

<ul>
    @foreach($recordings as $recording)
    <li>
        <a href="{{ route('recordings.playback', $recording->event->id) }}">
            {{ $recording->event->title }} - {{ $recording->created_at->format('Y-m-d H:i:s') }}
        </a>
    </li>
    @endforeach
</ul>
@endsection

