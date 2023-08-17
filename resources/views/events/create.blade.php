@extends('layouts.app')

@section('content')
    <h1>Create Event</h1>

    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <!-- Similarly, add other form fields for description, date, time, etc. -->
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
