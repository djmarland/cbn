@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>Welcome</h1>
            <p>Welcome to X. This is a quick introductory tour...
                @if(Auth::check())
                <a href="{{ URL::route('user_dashboard', array('key' => Auth::user()->url_key())) }}">Skip</a>
                @endif
            </p>
        </div><!--
    --></div>
@stop
