@extends('layouts.master')

@section('content')
    <div class="welcome">
        <h1>Page not found</h1>
        @include('partials.messages')
        <p>Please try again, or visit the <a href="{{ route('home', array(), false) }}">homepage</a></p>
    </div>
@stop