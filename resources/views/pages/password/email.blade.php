@extends('layouts.container.container')

@section('title', 'Восстановление пароля')

@section('content')
    <div class="page-header text-center">
        <h3>Восстановление пароля</h3>
    </div>
    <form class="password form-horizontal col-md-3" role="form" method="POST" action="{{ url('/password/email') }}">
        @if (session('status'))
            <div class="form-group alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                   placeholder="E-Mail">
            @if ($errors->has('email'))
                <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">
                Сбросить пароль
            </button>
        </div>

        <div class="form-group text-center">
            <a href="{{ url('/login') }}">Войти</a>
            <span>или</span>
            <a href="{{ url('/register') }}">зарегистрироваться</a>
        </div>
    </form>

@endsection
