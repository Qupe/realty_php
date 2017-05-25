@extends('layouts.container.container')

@section('title', $realty['name'])

@section('content')
    @include('blocks.return.return', [
        'text' => 'Вернутся к списку недвижимости',
        'link' => @url('/realty'),
        'align' => 'left'
    ])

    <div class="page-header">
        <h3>{{ $realty['name'] }}</h3>
    </div>
    <div class="realty-object row">
        <div class="realty-object__left col-lg-4">

        </div>
        <div class="realty-object__right col-lg-8">
            <div class="realty-object__created-at">
                 <b>Создано:</b> {{ $realty['created_at'] }}
            </div>
            <div class="realty-object__updated-at">
                <b>Обновлено:</b> {{ $realty['updated_at'] }}
            </div>
            <div class="realty-object__realty-type">
                <b>Тип сделки:</b> {{ $transaction_types[$realty['transaction_type']] }}
            </div>
            <div class="realty-object__realty-type">
                <b>Тип недвижимости:</b> {{ $realty_types[$realty['realty_type']] }}
            </div>
            <div class="realty-object__price">
                <b>Цена:</b> {{ $realty['price'] }} руб.
            </div>
            <div class="realty-object__props">
                <b>Общая информация:</b><br/>
                @foreach($properties as $key => $prop)
                    <b>{{ $prop['name'] }}:</b> {{ $prop['value'] }} {{ $prop['unit'] }}<br/>
                @endforeach
            </div>
            <div class="realty-object__description">
                {{ $realty['description'] }}
            </div>
        </div>
    </div>

@endsection