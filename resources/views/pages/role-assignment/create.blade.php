@extends('layouts.default')

@section('title', lang('title.assign-a-role'))

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>@lang('title.assign-a-role')</h1></div>
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
                    <form class="form-horizontal" action="{{ route('role-assignment.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="user_id" class="col-sm-4 control-label">@lang('title.user')</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="user_id">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->username}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role_id" class="col-sm-4 control-label">@lang('title.role')</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="role_id">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary center-block">@lang('title.assign-role')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
