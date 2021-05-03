@extends('templates.default')

@section('title', 'Все пользователи')

@section('content')

@if (session()->get('success'))
    <div class="alert alert-success mt-3">
        {{session()->get('success')}}
    </div>
@endif

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">E-mail</th>
        <th scope="col">Username</th>
        <th scope="col">City</th>
        <th scope="col">Gender</th>
        <th scope="col">Age</th>
        <th scope="col">First name</th>
        <th scope="col">Last name</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            
        
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->email}}</td>
        <td>{{$user->username}}</td>
        <td>{{$user->city}}</td>
        <td>{{$user->gender}}</td>
        <td>{{$user->age}}</td>
        <td>{{$user->first_name}}</td>
        <td>{{$user->last_name}}</td>
        <td >
            <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">
                <i class="fas " >edit</i>
            </a>
            <form method="POST" action="{{route('users.destroy', $user->id)}}" style="display: contents;">
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fas " >del</i>
            </button>
        </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection