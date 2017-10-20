@extends('emails.layouts.email')

@section('content')
    <p>{{ lang('email.salutation', ['username' => $user->username]) }}</p>
    <p>@lang('email-verification.please-verify-email')</p>

    @component('emails.components.button')
        @slot('url')
            {{ route('user.email.verify', ['id' => $user->id, 'token' => $user->email_verification_token]) }}
        @endslot
        @slot('text')
            @lang('email-verification.verify-email-address')
        @endslot
    @endcomponent

    <p>@lang('email.signoff')</p>

@endsection
