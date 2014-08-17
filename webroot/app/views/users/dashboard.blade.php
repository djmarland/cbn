@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>@if ($data->user->hasName())
                Welcome {{ $data->user->name }}
            @else
                Your dashboard
            @endif</h1>
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
                    @if(!empty($data->has_companies))
                        <table class="table">
                            <thead>
                                <th>Company</th>
                                <th>Member status</th>
                            </thead>
                            <tbody>
                            @foreach($data->companies_for_user as $company_for_user)
                                <tr>
                                    <td><a href="{{ URL::route('companies_show', array(
                                    'key' => $company_for_user->getCompany()->url_entity()
                                )) }}">{{ $company_for_user->getCompany()->name }}</a></td>
                                    <td>{{ $company_for_user->getStatusText() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>You are not yet a member of any companies</p>
                    @endif
                    <p><a href="{{ URL::route('companies_new') }}">Create a new company</a></p>
                    <p><a href="#">Join a company</a></p>
                </div>
            </div>
            @if ($data->user->isAdmin())
            <div class="box">
                <div class="box__head">
                    <h2>Admin</h2>
                </div>
                <div class="box__body">
                       <ul>
                           <li><a href="{{ URL::route('user_list') }}">All users</a></li>
                       </ul>
                </div>
            </div>
            @endif
        </div><!--
    --></div>
@stop
