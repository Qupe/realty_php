@extends('layouts.container.container')

@section('title', 'Агентства недвижимости')

@section('content')

    <div class="page-header">
        <h3>Агентства недвижимости</h3>
    </div>

    <table class="agencies table table-hover">
        @foreach ($agencies as $item)
            <tr class="agencies__item">
                <td class="agencies__item-name">
                    <a href="/agencies/agency/{{ $item['id'] }}">{{ $item['name'] }}</a>
                </td>
                <td class="agencies__item-description">
                    {{ $item['address'] }}
                </td>
                <td class="agencies__item-email">
                    <a href="mailto:{{ $item['email'] }}" >{{ $item['email'] }}</a>
                </td>
                <td class="agencies__item-adv-count text-center">
                    {{ rand(1, 20) }}
                </td>
        @endforeach
    </table>
@endsection