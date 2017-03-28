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
                @if ($agency['address'])
                    <dt>Адрес:</dt>
                    <dd>
                        {{ $agency['address'] }}
                        <a href=""></a>
                    </dd>
                @endif
                @if ($agency['phone'])
                    <dt>Телефон:</dt>
                    <dd>
                        <a href="tel:{{ $agency['phone'] }}">{{ $agency['phone'] }}</a>
                    </dd>
                @endif
                @if ($agency['email'])
                    <dt>E-mail:</dt>
                    <dd>
                        <a href="mailto:{{ $agency['email'] }}" target="_blank">{{ $agency['email'] }}</a>
                    </dd>
                @endif
                @if ($agency['site'])
                    <dt>Сайт:</dt>
                    <dd>
                        <a href="http://{{ $agency['site'] }}" target="_blank">{{ $agency['site'] }}</a>
                    </dd>
                @endif
            </dl>
        </div>
    </div>
@endsection