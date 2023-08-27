@extends('layouts.app')

@section('content')
<h1>{{ $event->id ? 'Edit' : 'Create' }} Event</h1>

<form action="{{ $event->id ? route('events.update', $event->id) : route('events.store') }}" method="post">
    @csrf
    @if($event->id)
        @method('PUT')
    @endif
    
    <div>
        <label>Title:</label>
        <input type="text" name="title" value="{{ $event->title }}" required>
    </div>
    
    <div>
        <label>Description:</label>
        <textarea name="description" required>{{ $event->description }}</textarea>
    </div>

    <div>
        <label for="academic_program">Academic Program:</label>
        <select name="academic_program_id" id="academic_program">
            @foreach($academicPrograms as $program)
                <option value="{{ $program->id }}" @if($event->academic_program_id == $program->id) selected @endif>{{ $program->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="campus_location">Campus Location:</label>
        <select name="campus_location_id" id="campus_location">
            @foreach($campusLocations as $location)
                <option value="{{ $location->id }}" @if($event->campus_location_id == $location->id) selected @endif>{{ $location->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <button type="submit">{{ $event->id ? 'Update' : 'Create' }} Event</button>
    </div>
</form>

<a href="{{ route('events.index') }}">Back to Events</a>
@endsection

