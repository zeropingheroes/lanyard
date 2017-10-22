@extends('layouts.default')

@section('title', lang('title.create-item', ['item' => lang('title.venue')]))

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>@lang('title.create-item', ['item' => lang('title.venue')])</h1></div>
                <div class="panel-body">
                    @include('components.alerts')
                    <form class="form-horizontal" action="{{ route('venue.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name"
                                   class="col-sm-4 control-label">@lang('title.item-name', ['item' => lang('title.venue')])</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="@lang('title.item-name', ['item' => lang('title.venue')])"
                                       value="{{ old('name', $venue->name) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address"
                                   class="col-sm-4 control-label">@lang('title.address')</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="address" name="address"
                                       placeholder="@lang('title.address')"
                                       value="{{ old('name', $venue->address) }}">
                            </div>
                        </div>
                        <button type="submit"
                                class="btn btn-primary center-block">@lang('title.create-item', ['item' => lang('title.venue')])</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
