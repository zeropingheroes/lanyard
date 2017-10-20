@extends('layouts.default')

@section('title', lang('title.login'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('title.login')</div>

                    <div class="panel-body">
                        <div class="row">
                            <p class="text-center">@lang('phrase.please-sign-in')</p>
                        </div>
                        <div class="row">
                            <a href="{{ url('/auth/steam') }}"><img src="{{ asset('images/sits_small.png') }}"
                                                                    alt="@lang('title.sits')"
                                                                    class="img-responsive center-block"></a>
                        </div>
                        <div class="row">&nbsp;</div>
                        <div class="row">
                            <p class="text-center">@lang('phrase.no-steam-account') <a
                                        href="https://store.steampowered.com/join/">@lang('phrase.create-steam-account')<a/></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
