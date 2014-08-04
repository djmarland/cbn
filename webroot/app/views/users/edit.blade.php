@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>Edit your details</h1>
            @include('partials.messages')
            {{ Form::open(array('route' => array('user_edit', $data->user->url_key()))) }}
            <!-- if there are login errors, show them here -->
            <p>
                {{ Form::label('email', 'Email Address') }}
                {{ Form::email(
                    'email',
                    (Input::old('email')) ? Input::old('email') : $data->user->email,
                    array(
                        'placeholder' => 'name@example.com'
                    )
                ) }}
                {{ $errors->first('email') }}
            </p>

            <fieldset>
                <legend>Change Password</legend>
            <p>
                {{ Form::label('password', 'New Password') }}
                {{ Form::password('password') }}
                {{ $errors->first('password') }}
            </p>
            <p>
                {{ Form::label('password_confirmation', 'Confirm New Password') }}
                {{ Form::password('password_confirmation') }}
                {{ $errors->first('password_confirmation') }}
            </p>
            </fieldset>

            <p>{{ Form::submit('Submit!') }}</p>
        {{ Form::close() }}
        </div><!--
    --></div>
@stop
