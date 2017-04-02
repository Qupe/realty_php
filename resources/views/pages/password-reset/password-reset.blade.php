@extends('layouts.container.container')

@section('title', 'Сброс пароля')

@section('content')
    <div class="page-header text-center">
        <h3>Сброс пароля</h3>
    </div>
    <form class="col-md-3 form-horizontal password-reset" role="form" method="POST" action="{{ url('/password/reset') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}"
                   placeholder="E-Mail">
            @if ($errors->has('email'))
                <span class="help-block">
                    {{ $errors->first('email') }}
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="form-control" name="password" placeholder="Пароль">
            @if ($errors->has('password'))
                <span class="help-block">
                    {{ $errors->first('password') }}
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                   placeholder="Подтверждение пароля">
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    </strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Сбросить пароль</button>
        </div>

        <div class="form-group text-center">
            <a href="{{ url('/login') }}">Войти</a>
            <span>или</span>
            <a href="{{ url('/register') }}">зарегистрироваться</a>
        </div>
    </form>
@endsection
