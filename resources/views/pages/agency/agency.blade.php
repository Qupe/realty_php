@extends('layouts.container.container')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @include('blocks.return.return', [
        'text' => 'Вернутся к списку агентств',
        'link' => '/agencies',
        'align' => 'left'
    ])
    <div class="page-header">
        <h3>{{ $agency['name'] }}</h3>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <p>{{ $agency['description'] }}</p>
        </div>
        <div class="col-lg-5">
            <dl class="dl-horizontal">
                <dt>Адрес:</dt>
                <dd>
                    {{ $agency['address'] }}
                </dd>
                <dt>Телефон:</dt>
                <dd>
                    <a href="tel:{{ $agency['phone'] }}">{{ $agency['phone'] }}</a>
                </dd>
                <dt>E-mail:</dt>
                <dd>
                    <a href="mailto:{{ $agency['email'] }}" target="_blank">{{ $agency['email'] }}</a>
                </dd>
                <dt>Сайт:</dt>
                <dd>
                    <a href="http://{{ $agency['site'] }}" target="_blank">{{ $agency['site'] }}</a>
                </dd>
            </dl>
        </div>
    </div>
@endsection