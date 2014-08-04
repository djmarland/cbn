@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>Delete your account</h1>
            @include('partials.messages')
            <p>Are you sure you wish to delete your account. All your data will be deleted immediately.</p>
            {{ Form::open(array('route' => array(
                    'user_delete',
                    $data->user->url_key()
                    )
                )
            ) }}
                <p>{{ Form::submit('Delete') }} </p>
            {{ Form::close() }}
        </div><!--
    --></div>
@stop
