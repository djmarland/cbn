@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>Forgotten your password?</h1>
            @include('partials.messages')
            <form action="{{ action('RemindersController@postRemind')}}" method="POST">
                <p><label for="email">E-mail: </label><input id="email" type="email" name="email" />
        {{ $errors->first('email') }}</p>
                <p><input type="submit" value="Send reminder" /></p>
            </form>
        </div><!--
    --></div>
@stop