@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>Reset your password?</h1>
            @include('partials.messages')
            <form action="{{ action('RemindersController@postReset')}}" method="POST">
                <input type="hidden" name="token" value="{{ $token }}" />
                <p>
                    {{ Form::label('email', 'Email Address') }}
                    {{ Form::email('email', Input::old('email'), array('placeholder' => 'name@example.com')) }}
                    {{ $errors->first('email') }}
                </p>
                <p><label for="form_password">New Password:</label> <input type="password" name="password" id="form_password" /> {{ $errors->first('password') }}</p>
                <p><label for="form_password_confirmation">New Password (confirm):</label> <input type="password" name="password_confirmation" id="form_password_confirmation" /> {{ $errors->first('password_confirmation') }}</p>
                <p><input type="submit" value="Reset Password" /></p>
            </form>
        </div><!--
    --></div>
@stop