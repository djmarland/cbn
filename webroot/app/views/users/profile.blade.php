@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            @include('partials.messages')
            <h1>{{ $data->user->getDisplayName() }}</h1>
        </div><!--
    --></div>

    @if ($data->show_companies)
<h2>Companies</h2>
<ul>
    @foreach($data->companies_for_user as $company_for_user)
    <li><a href="{{ URL::route('companies_show', array(
                        'key' => $company_for_user->getCompany()->url_entity()
                    )) }}">{{ $company_for_user->getCompany()->name }}</a></li>
    @endforeach
</ul>
    @endif
@stop
