@extends('layouts.app')

@section('title', $user->username)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{{ $user->username }}</h1></div>

                    <div class="panel-body">
                        @include('components.alerts')
                        <div class="row">
                            <div class="col-md-4"><strong>@lang('title.username'):</strong></div>
                            <div class="col-md-6">{{ $user->username }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><strong>@lang('title.full-name'):</strong></div>
                            <div class="col-md-6">{{ $user->full_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><strong>@lang('title.email'):</strong></div>
                            <div class="col-md-6">
                                {{ $user->email }}
                                @if($user->email_verified)
                                    <span class="label label-success">@lang('title.verified')</span>
                                @else
                                    <span class="label label-danger">@lang('title.not-verified')</span>
                                @endif
                            </div>
                        </div>
                        @can('update', $user)
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a class="btn btn-default" href="{{ route('user.edit', $user->id) }}" role="button">@lang('title.edit-profile')</a>
                                    @if(! $user->email_verified)
                                        <a class="btn btn-default" href="{{ route('user.email.resend-verification-email', $user->id) }}" role="button">@lang('title.resend-verification-email')</a>
                                    @endif
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
