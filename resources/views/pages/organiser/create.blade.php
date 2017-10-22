@extends('layouts.default')

@section('title', lang('title.create-item', ['item' => lang('title.organiser')]))

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>@lang('title.create-item', ['item' => lang('title.organiser')])</h1></div>
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
                    <form class="form-horizontal" action="{{ route('organiser.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name"
                                   class="col-sm-4 control-label">@lang('title.item-name', ['item' => lang('title.organiser')])</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="@lang('title.item-name', ['item' => lang('title.organiser')])"
                                       value="{{ old('name', $organiser->name) }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary center-block">@lang('title.create-item', ['item' => lang('title.organiser')])</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
