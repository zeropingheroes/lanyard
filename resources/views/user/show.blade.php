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
                            <div class="col-md-4"><strong>{{ lang('models.user.username') }}:</strong></div>
                            <div class="col-md-6">{{ $user->username }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><strong>{{ lang('models.user.full_name') }}:</strong></div>
                            <div class="col-md-6">{{ $user->full_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><strong>{{ lang('models.user.email') }}:</strong></div>
                            <div class="col-md-6">
                                @if($user->email_verified)
                                    <span class="label label-success">{{ lang('models.user.email_is_verified') }}</span>
                                @else
                                    <span class="label label-danger">{{ lang('models.user.email_is_not_verified') }}</span>
                                @endif
                                {{ $user->email }}
                            </div>
                        </div>
                        @can('update', $user)
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a class="btn btn-default" href="{{ route('user.edit', $user->id) }}" role="button">{{ lang('routes.user.edit') }}</a>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
