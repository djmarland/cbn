@extends('layouts.master')

@section('content')
<div class="grid"><!--
    --><div class="g">
        <h1>All Users</h1>
        @include('partials.messages')

                @if(!empty($data->users))
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th class="cell--action">Verified</th>
                        <th class="cell--action">Admin</th>
                        <th class="cell--action">Edit</th>
                    </thead>
                    <tbody>
                        @foreach($data->users as $user)
                        <tr>
                            <td><a href="{{ URL::route('user_profile', array(
                                    'key' => $user->url_key()
                                )) }}">{{ $user->getDisplayName() }}</a>
                            </td>
                            <td class="cell--action">
                                @if ($user->isVerified())
                                    <i class="fa fa-check"></i>
                                @endif
                            </td>
                            <td class="cell--action">
                                @if ($user->isAdmin())
                                    <i class="fa fa-check"></i>
                                @endif
                            </td>
                            <td class="cell--action"><a class="btn" href="{{ URL::route('user_edit', array(
                                    'key' => $user->url_key()
                                )) }}"><i class="fa fa-pencil"></i></a>
                            </td>
                    @endforeach
                    </tbody>
                </table>
                @endif
    </div><!--
--></div>
@stop
