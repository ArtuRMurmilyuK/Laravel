@extends('templates.default')

@section('title', 'Все мероприятия')

@section('content')
<a href="{{route('events.create')}}" class="btn btn-success">Создать пост</a>

@if (session()->get('success'))
    <div class="alert alert-success mt-3">
        {{session()->get('success')}}
    </div>
@endif

<table class="table table-striped mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Название</th>
        <th scope="col">Описание</th>
        <th scope="col">Взнос</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
      <tr>
        <th scope="row">{{$event->id}}</th>
        <td>{{$event->title}}</td>
        <td>{{$event->description}}</td>
        <td>{{$event->price}}</td>
        <td >
            <a href="{{route('events.show', $event->id)}}" class="btn btn-success" >
                <i class="fas  " >see</i>
            </a>
            
            <a href="{{route('event.particional', ['eventsId'=>$event->id])}}" class="btn btn-primary">
              <i class="fas " >Enter</i>
              <i class="fas " >{{$event->particionals->count()}} {{ Str::plural('user', $event->particionals->count())}}</i>
            </a>
            
            @if (\Auth::user()->admin)
            <a href="{{route('events.edit', $event->id)}}" class="btn btn-primary">
                <i class="fas " >edit</i>
            </a>
            <a href="{{route('events.entry', ['eventsId'=>$event->id])}}" class="btn btn-primary">
              <i class="fas " >entry</i>
          </a>
            <form method="POST" action="{{route('events.destroy', $event->id)}}" style="display: contents;">
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fas " >del</i>
            </button>
            @endif
        </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection