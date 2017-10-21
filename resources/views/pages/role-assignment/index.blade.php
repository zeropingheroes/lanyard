@extends('layouts.default')

@section('title', lang('title.role-assignments'))

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>@lang('title.role-assignments')</h1></div>
                <div class="panel-body">
                    @include('components.alerts')
                    @include('pages.role-assignment.partials.list', ['roleAssignments' => $roleAssignments])
                </div>
            </div>
        </div>
    </div>
@endsection
