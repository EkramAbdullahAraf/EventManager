@extends('layouts.app')

@section('content')
    <h1>All Events</h1>
    <div class="row">
        @foreach($events as $event)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a>
                    </div>
                    <div class="card-body">
                        <p>{{ Str::limit($event->description, 100) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
