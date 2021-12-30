@component('mail::message')
    # Introduction

    The body of your message.

    @component('mail::button', ['url' => $mailData['url']])
        Confirmar la cita
    @endcomponent
    \\\

    Thanks,\

    {{ config('app.name') }}
@endcomponent
