@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>

                    <div class="panel-body">
                        <a href="{{ url('/auth/steam') }}"><img src="{{ asset('images/sits_small.png') }}"
                                                                alt="Sign in through Steam"
                                                                class="img-responsive center-block"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
