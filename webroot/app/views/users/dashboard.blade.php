@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>Dashboard</h1>
            @include('partials.messages')
            <ul>
                <li><a href="{{ URL::route('user_edit', array('key' => $data->user->url_key())) }}">Edit details</a></li>
                <li><a href="{{ URL::route('user_delete', array('key' => $data->user->url_key())) }}">Delete Account</a></li>
            </ul>

            <div class="box">
                <div class="box__head">
                    <h2>My companies</h2>
                </div>
                <div class="box__body">
                    @if(!empty($data->companies))
                        <ul>
                            @foreach($data->companies as $company)
                                <li><a href="{{ URL::route('companies_show', array(
                                    'key' => $company->url_entity()
                                )) }}">{{ $company->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                    <p><a href="{{ URL::route('companies_new') }}">Create a new company</a></p>
                    <p><a href="#">Join a company</a></p>
                </div>
            </div>
        </div><!--
    --></div>
@stop
