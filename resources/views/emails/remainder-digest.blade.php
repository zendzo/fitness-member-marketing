@component('mail::message')
# Remainder to work on

You have some remainder to follow up. Below are the details:

@component('mail::table')
| Remainder | Lead Name | Phone |
| --------- |:---------:| -----:|
@foreach ($remainders as $remainder)
| {{$remainder['remainder']}} | {{$remainder['lead']['name']}} | {{$remainder['lead']['phone']}} |
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
