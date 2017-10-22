@extends('layouts.default')

@section('title', lang('title.edit-profile'))

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>@lang('title.edit-profile')</h1></div>

                <div class="panel-body">
                    @include('components.alerts')
                    <form class="form-horizontal" action="{{ route('user.update', $user->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label class="col-sm-4 control-label">@lang('title.username')</label>
                            <div class="col-sm-8">
                                <p class="form-control-static">{{ $user->username }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="full_name" class="col-sm-4 control-label">@lang('title.full-name')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="@lang('title.full-name')" value="{{ old('full_name', $user->full_name) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">@lang('title.email')</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" name="email" placeholder="@lang('title.email')" value="{{ old('email', $user->email) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">@lang('title.confirm-email')</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email_confirmation" name="email_confirmation" placeholder="@lang('title.confirm-email')" value="{{ old('email_confirmation', $user->email) }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary center-block">@lang('title.update-profile')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection