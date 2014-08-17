@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>@if ($data->parent_company)
                    <a href="{{ URL::route('companies_show', array(
                        'key' => $data->parent_company->url_entity()
                    )) }}">{{ $data->parent_company->name }}</a>:
                @endif
                {{ $data->company->name }}</h1>
        </div><!--
--></div>@if ($data->divisions_count)<!--
    --><div class="grid"><!--
--><div class="g">
    <h2>Divisions</h2>
    <ul>
        @foreach($data->divisions as $company)
            <li><a href="{{ URL::route('companies_show', array(
                'key' => $company->url_entity()
            )) }}">{{ $company->name }}</a></li>
        @endforeach
    </ul>
</div></div>
@endif

@if ($data->show_users)<!--
    --><div class="grid"><!--
--><div class="g">
        <h2>Members</h2>
<ul>
    @foreach($data->users_in_company as $user_in_company)
    <li><a href="{{ URL::route('user_profile', array(
                'key' => $user_in_company->getUser()->url_key()
            )) }}">{{ $user_in_company->getUser()->getDisplayName() }}</a></li>
    @endforeach
</ul>
    </div></div>
@endif
@stop
