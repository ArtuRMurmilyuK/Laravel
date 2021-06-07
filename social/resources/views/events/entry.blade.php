@extends('templates.default')

@section('title', 'Учасники')

@section('content')

@if (session()->get('success'))
    <div class="alert alert-success mt-3">
        {{session()->get('success')}}
    </div>
@endif

<table class="table table-striped mt-3">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Почта</th>
        <th scope="col">User-name</th>
        <th scope="col">Возраст</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <th scope="row">{{$user->email}}</th>
        <th scope="row">{{$user->username}}</th>
        <th scope="row">{{$user->age}}</th>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection