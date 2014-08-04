@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>Create new company</h1>
            @include('partials.messages')
            {{ Form::open(array('route' => 'companies_new')) }}
                <!-- if there are login errors, show them here -->
                <p>
                    {{ Form::label('name', 'Company name') }}
                    {{ Form::text('name', Input::old('name')) }}
                    {{ $errors->first('name') }}
                </p>

                <p>
                    {{ Form::label('url_word', 'URL name') }}
                    {{ Form::text('url_word', Input::old('url_word')) }}
                    {{ $errors->first('url_word') }}
                </p>

                <p>{{ Form::submit('Submit!') }}</p>
            {{ Form::close() }}
        </div><!--
    --></div>
@stop
