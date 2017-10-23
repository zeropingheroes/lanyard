@extends('layouts.default')

@section('title', lang('title.create-item', ['item' => lang('title.event')]))

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>@lang('title.create-item', ['item' => lang('title.event')])</h1></div>
                <div class="panel-body">
                    @include('components.alerts')
                    <form class="form-horizontal" action="{{ route('event.store') }}" method="POST">
                        @include('pages.event.partials.form')
                        <button type="submit"
                                class="btn btn-primary center-block">@lang('title.create-item', ['item' => lang('title.event')])</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
