@component('mail::message')
# Order Notice

{{$name}} has just made an order for {{$product}} at &#8358;{{$price}} totalling &#8358;{{$total_price}}, please login to check and verify the order

@component('mail::button', ['url' => 'https://faveluxury.online/admin'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
