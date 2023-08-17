@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Event</h1>
        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ $event->description }}</textarea>
            </div>

            <!-- Add fields for date, time, location, etc. -->

            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
@endsection
