@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-6">
    <h3>Редактировать</h3>
        <form method="POST" action="{{ route('profile.edit') }}" novalidate>
            @csrf
            <div class="form-group">
                <label for="first_name">Ваше имя</label>
                <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="first_name"  value="{{Request::old('first_name') ?: Auth::user()->first_name}}">

                @if($errors->has('first_name'))
                <span class="help-block text-danger">
                    {{$errors->first('first_name')}}
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="last_name">Ваша фамилия</label>
                <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" id="last_name" value="{{Request::old('last_name') ?: Auth::user()->last_name}}">

                @if($errors->has('last_name'))
                <span class="help-block text-danger">
                    {{$errors->first('last_name')}}
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="city">Город</label>
                <input type="text" name="city" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" id="city" value="{{Request::old('city') ?: Auth::user()->city}}">

                @if($errors->has('city'))
                <span class="help-block text-danger">
                    {{$errors->first('city')}}
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="age">Возраст</label>
                <input type="text" name="age" class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" id="age" value="{{Request::old('age') ?: Auth::user()->age}}">

                @if($errors->has('age'))
                <span class="help-block text-danger">
                    {{$errors->first('age')}}
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Обновить профиль</button>
        </form>
    </div>
</div>
@endsection