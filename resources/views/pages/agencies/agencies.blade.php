@extends('layouts.container.container')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <table class="agencies table table-hover">
        @foreach ($users as $user)
            <tr>
                <td class="agencies__item-logo">

                </td>
                <td class="agencies__item-name">
                    <a href="/agency/{{ $user['id'] }}">{{ $user['name'] }}</a>
                </td>
                <td class="agencies__item-description">
                    {{ $user['description'] }}
                </td>
            </tr>
        @endforeach
    </table>
@endsection