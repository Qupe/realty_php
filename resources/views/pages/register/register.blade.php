@extends('layouts.container.container')

@section('title', 'Регистрация')

@section('content')

    <div class="page-header text-center">
        <h3>Регистрация</h3>
    </div>

    <form class="register form-horizontal col-md-3" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Имя">

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="form-control" name="password" placeholder="Пароль">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Подтверждеине пароля">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Согласен с <a href="">условиями</a>
                </label>
            </div>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-block">Зарегистрироватся</button>
        </div>

        <div class="form-group text-center">
            <a href="{{ url('/login') }}">Уже зарегистрированы?</a>
            <span>или</span>
            <a href="{{ url('/password/reset') }}">забыли пароль?</a>
        </div>
    </form>
@endsection
