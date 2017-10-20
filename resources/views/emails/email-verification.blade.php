@extends('emails.layouts.email')

@section('content')
    <p>{{ lang('phrase.greeting', ['username' => $user->username]) }}</p>
    <p>@lang('phrase.please-verify-email')</p>

    @component('emails.components.button')
        @slot('url')
            {{ route('user.email.verify', ['id' => $user->id, 'token' => $user->email_verification_token]) }}
        @endslot
        @slot('text')
            @lang('title.verify-email-address')
        @endslot
    @endcomponent

    <p>@lang('phrase.signoff')</p>

@endsection
