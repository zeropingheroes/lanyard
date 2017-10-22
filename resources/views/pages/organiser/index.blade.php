@extends('layouts.default')

@section('title', lang('title.organisers'))

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>@lang('title.organisers')</h1></div>
                <div class="panel-body">
                    @include('components.alerts')
                    @include('pages.organiser.partials.list', ['organisers' => $organisers])
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-primary" href="{{ route('organiser.create') }}" role="button">@lang('title.create-item', ['item' => lang('title.organiser')])</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
