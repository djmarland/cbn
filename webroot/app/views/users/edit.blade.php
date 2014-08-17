@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>Edit your details</h1>
            @include('partials.messages')
            {{ Form::open(array('route' => array('user_edit', $data->user->url_key()))) }}
            <!-- if there are login errors, show them here -->
            <p>
                {{ Form::label('name', 'Name (for display)') }}
                {{ Form::text(
                'name',
                (Input::old('name')) ? Input::old('name') : $data->user->name
                ) }}
                {{ $errors->first('email') }}
            </p>
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

            @if ($data->show_admin_status)
                @if ($data->editable_admin_status)
                    {{ Form::label('is_site_admin', 'Is Site Admin?') }}
                    {{ Form::checkbox(
                        'is_site_admin',
                        1,
                        (Input::old('is_site_admin')) ? Input::old('is_site_admin') : $data->user->isAdmin()
                    ) }}
                    {{ $errors->first('is_site_admin') }}
                @else
                    <p class="btn">User is an admin</p>
                @endif
            @endif

            <p>{{ Form::submit('Submit!') }}</p>
        {{ Form::close() }}
        </div><!--
    --></div>
@stop
