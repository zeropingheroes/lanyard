@extends('layouts.app')

@section('title', lang('routes.user.edit'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{{ lang('routes.user.edit') }}</h1></div>

                    <div class="panel-body">
                        @include('components.alerts')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{ route('user.update', $user->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label class="col-sm-4 control-label">{{ lang('models.user.username') }}</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static">{{ $user->username }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="full_name" class="col-sm-4 control-label">{{ lang('models.user.full_name') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="{{ lang('models.user.full_name') }}" value="{{ old('full_name', $user->full_name) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">{{ lang('models.user.email') }}</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{ lang('models.user.email') }}" value="{{ old('email', $user->email) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">{{ lang('models.user.email_confirmation') }}</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email_confirmation" name="email_confirmation" placeholder="{{ lang('models.user.email_confirmation') }}" value="{{ old('email_confirmation', $user->email) }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary center-block">{{ lang('routes.user.update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection