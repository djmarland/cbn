@extends('layouts.master')

@section('content')
@include('partials.messages')
    <div class="grid"><!--
    --><div class="g g-l-1-2 g-xl-2-3">
            <h1>HOME PAGE</h1>
            <p><a href="{{ URL::route('companies_list') }}">List of companies</a></p>
            <p>Current time: {{ date('F j, Y, g:i A') }}  </p>
            <p>Now (according to Carbon): {{ Carbon::now()->toDateTimeString() }}</p>
            <?
                Cache::add('stored_now', Carbon::now(), 1);
                if (Cache::has('stored_now')) {
                    $time = Cache::get('stored_now')->toDateTimeString();
                } else {
                    $time = 'Nothing yet';
                }
            ?>
            <p>Time in cache: {{ $time }}</p>
        </div><!--
        --><div class="g g-l-1-2 g-xl-1-3">
            @if(!Auth::check())
                <h2>Login/Register</h2>
                @include('partials.regin')
            @endif
        </div><!--
    --></div>
@stop
