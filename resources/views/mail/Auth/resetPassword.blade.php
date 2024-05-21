<x-mail::message>
<h1>Hello {{ $client->name }}</h1>

Blood Bank Reset Password

<h3><b>your code {{ $client->pin_code }}</b></h3>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
