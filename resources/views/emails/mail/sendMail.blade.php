@component('mail::message')
# {{$contents['subject']}}

{{$contents['message']}}

@component('mail::button', ['url' => url($contents['attachment'])])
View Attachment
@endcomponent
Thanks,<br>
Test College
@endcomponent
