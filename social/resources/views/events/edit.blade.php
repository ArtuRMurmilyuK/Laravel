@extends('templates.default')

@section('title', 'Редактировать пост'.$event->id)

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<form method="POST" action="{{route('events.update', $event)}}">
    @method('PATCH')
    @csrf
    <div class="form-group">
      <label for="post-title">Название</label>
      <input type="text" value="{{$event->title}}" name="title" class="form-control" id="post-title" >
    </div>
    <div class="form-group">
      <label for="post-description">Описание</label>
      <textarea class="form-control"  name="description" id="post-description" rows="3">{{$event->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="post-price">Цена</label>
        <input type="text" value="{{$event->title}}" name="price" class="form-control" id="post-price" >
      </div>
      <button type="submit" class="btn btn-success">Отредактировать</button>
  </form>
</div>
</div>
@endsection