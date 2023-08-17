@extends('layouts.app')

@section('content')
    <h1>All Events</h1>
    <div class="row">
        @foreach($events as $event)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a>
                        {{ $events->links() }}
                        <form method="GET" action="{{ route('events.index') }}">
                            <div class="input-group mb-3">
                                <input type="text" name="search" class="form-control" placeholder="Search for events..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>


                    </div>
                    <div class="card-body">
                        <p>{{ Str::limit($event->description, 100) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
