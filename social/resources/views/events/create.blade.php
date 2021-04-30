@extends('templates.default')

@section('title', 'Добавить пост')

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
<form method="POST" action="{{route('events.store')}}">
    @csrf
    <div class="form-group">
      <label for="post-title">Название</label>
      <input type="text" value="{{old('title')}}" name="title" class="form-control" id="post-title" >
    </div>
    <div class="form-group">
      <label for="post-description">Описание</label>
      <textarea class="form-control"  name="description" id="post-description" rows="3">{{old('description')}}</textarea>
    </div>
    <div class="form-group">
        <label for="post-price">Цена</label>
        <input type="text" value="{{old('price')}}" name="price" class="form-control" id="post-price" >
      </div>
      <button type="submit" class="btn btn-success">Добавить пост</button>
  </form>
</div>
</div>
@endsection