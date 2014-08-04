@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>Companies / Freelancers</h1>
            @include('partials.messages')
            <ul>
                @foreach($data->companies as $company)
                    <li><a href="{{ URL::route('companies_show', array(
                        'key' => $company->url_entity()
                    )) }}">{{ $company->name }}</a></li>
                @endforeach
            </ul>
        </div><!--
    --></div>
@stop
