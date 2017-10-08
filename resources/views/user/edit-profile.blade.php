@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Edit Profile</h1></div>

                    <div class="panel-body">
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
                                <label class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $user->username }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="full_name" class="col-sm-2 control-label">Full name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full name" value="{{ old('full_name', $user->full_name) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email address</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="user@example.com" value="{{ old('email', $user->email) }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection