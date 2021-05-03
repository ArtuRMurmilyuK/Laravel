@extends('templates.default')

@section('title', 'Редактировать пользователя'.$user->id)

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
<form method="POST" action="{{route('users.update', $user)}}">
    @method('PATCH')
    @csrf
    <div class="form-group">
      <label for="user-email">email</label>
      <input type="text" value="{{$user->email}}" name="email" class="form-control" id="user-email" >
    </div>
    <div class="form-group">
      <label for="user-username">username</label>
      <textarea class="form-control"  name="username" id="user-username" rows="3">{{$user->username}}</textarea>
    </div>
    <div class="form-group">
        <label for="user-first_name">First name</label>
        <textarea class="form-control"  name="first_name" id="user-first_name" rows="3">{{$user->first_name}}</textarea>
      </div>
      <div class="form-group">
        <label for="user-last_name">last_name</label>
        <textarea class="form-control"  name="last_name" id="user-last_name" rows="3">{{$user->last_name}}</textarea>
      </div>
      <div class="form-group">
        <label for="user-city">City</label>
        <textarea class="form-control"  name="city" id="user-city" rows="3">{{$user->city}}</textarea>
      </div>
      <div class="form-group">
        <label for="user-age">Age</label>
        <textarea class="form-control"  name="age" id="user-age" rows="3">{{$user->age}}</textarea>
      </div>
      <div class="form-group">
        <label for="user-gender">Gender</label>
        <textarea class="form-control"  name="gender" id="user-gender" rows="3">{{$user->gender}}</textarea>
      </div>
      <button type="submit" class="btn btn-success">Отредактировать</button>
  </form>
</div>
</div>
@endsection