@extends('layouts.default')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    Welcome {{ Auth::user()->username }}!
                </div>
            </div>
        </div>
    </div>
@endsection
