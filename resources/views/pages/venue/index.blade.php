@extends('layouts.default')

@section('title', lang('title.venues'))

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>@lang('title.venues')</h1></div>
                <div class="panel-body">
                    @include('components.alerts')
                    @include('pages.venue.partials.list', ['venues' => $venues])
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-primary" href="{{ route('venue.create') }}" role="button">@lang('title.create-item', ['item' => lang('title.venue')])</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
