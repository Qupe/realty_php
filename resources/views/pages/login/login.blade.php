@extends('layouts.container.container')

@section('title', 'Войти')

@section('content')
    <div class="page-header text-center">
        <h3>Войти</h3>
    </div>
    <form class="login form-horizontal col-md-3" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

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

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Запомнить меня
                </label>
            </div>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-block">Войти</button>
        </div>

        <div class="form-group text-center">
            <a href="{{ url('/register') }}">Еще не зарегистрированы?</a>
            <span>или</span>
            <a href="{{ url('/password/reset') }}">забыли пароль?</a>
        </div>
    </form>
@endsection
