@extends('layouts.app')

@section('content')
    <h1>{{ $event->title }}</h1>
    <p>{{ $event->description }}</p>
    <p>Date: {{ $event->date }}</p>
    <p>Time: {{ $event->time }}</p>
    <p>Location: {{ $event->location }}</p>
    @foreach($event->categories as $category)
        <span class="label label-info">{{ $category->name }}</span>
    @endforeach

@endsection
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
