@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            @include('partials.messages')
            <h1>Profile page for  "{{ $data->user->url_key() }}"</h1>
        </div><!--
    --></div>
@stop
