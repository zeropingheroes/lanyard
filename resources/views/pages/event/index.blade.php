@extends('layouts.default')

@section('title', lang('title.events'))

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>@lang('title.events')</h1></div>
                <div class="panel-body">
                    @include('components.alerts')
                    @include('pages.event.partials.list', ['events' => $events])
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-primary" href="{{ route('event.create') }}" role="button">@lang('title.create-item', ['item' => lang('title.event')])</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
