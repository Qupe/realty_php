@extends('layouts.base.base')

@section('body')
    @include('blocks.header.header')
        <div class="container">
            @yield('content')
        </div>
    @include('blocks.footer.footer')
@endsection