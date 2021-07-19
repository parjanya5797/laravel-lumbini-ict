@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => '','color'=>'green'])
Go to Webiste
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
