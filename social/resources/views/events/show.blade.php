@extends('templates.default')

@section('title', 'Просмотр поста'.$event->id)

@section('content')
<div class="card">
    <div class="card-body">
      <h3> {{$event->title }}</h3>
      <p>{{ $event->description }}</p>
      <p><b>{{ $event->price }}</b></p>
    </div>
  </div>
@endsection