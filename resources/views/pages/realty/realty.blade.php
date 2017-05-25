@extends('layouts.container.container')

@section('title', 'Недвижимость')

@section('content')
    <div class="page-header">
        <h3>Недвижимость</h3>
    </div>

    <table class="realty table table-hover">
        @foreach ($realty as $item)
            <tr class="realty__item">
                <td class="realty__item-date">
                    {{ $item['created_at'] }}
                </td>
                <td class="realty_item-transaction-type">

                </td>
                <td class="realty_item-realty-type">

                </td>
                <td class="realty__item-name">
                    <a href="/realty/{{ $item['id'] }}">
                        {{ $item['name'] }}
                    </a>
                </td>
                <td class="realty__item-price">
                    {{ $item['price'] }} руб.
                </td>
        @endforeach
    </table>
@endsection